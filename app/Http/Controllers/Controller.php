<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Feedback;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Service;
use App\Models\ServiceItem;
use App\Models\Product;
use App\Models\Project;
use App\Models\User;
use Faker\Provider\Lorem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Component;
use App\Models\Comporder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str; // Add this at the top of the controller

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function welcome()
    {
        return view('welcome', [
            'projects' => Project::latest()->filter(request(['search']))->paginate(4),
            'notifications' => Notification::latest()->get(),
        ]);

    }

    // Function to get all services
    public function getAllServices()
    {
        // Retrieve all services from the database
        //$services = Service::all();

        // Pass the services to the view
        //return view('services.index', ['services' => $services]);

        return view('services', [
            'services' => Service::latest()->filter(request(['search']))->paginate(50),
        ]);
    }

    public function getAllServicesLogedIn()
    {
        // Retrieve all services from the database
        //$services = Service::all();

        // Pass the services to the view
        //return view('services.index', ['services' => $services]);

        return view('serviceLogedIn', [
            'services' => Service::latest()->filter(request(['search']))->paginate(20),
        ]);
    }


    public function detailedService($id){
       // Retrieve the service by ID
       $service = Service::find($id);

       // Check if service exists
       if (!$service) {
           return redirect()->back()->with('error', 'Service not found');
       }

       // Retrieve all service items associated with the service
    $serviceItems = $service->serviceItems; // Assuming the relationship is set up correctly in the Service model

    // Pass the service and service items to the view
    return view('detailed-services', [
        'service' => $service,
        'serviceItems' => $serviceItems,
    ]);
    }

    public function logedInDetailedService($id){
        // Retrieve the service by ID
        $service = Service::find($id);
 
        // Check if service exists
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found');
        }
 
        // Retrieve all service items associated with the service
     $serviceItems = $service->serviceItems; // Assuming the relationship is set up correctly in the Service model
 
     // Pass the service and service items to the view
     return view('detailed-service-logedin', [
         'service' => $service,
         'serviceItems' => $serviceItems,
     ]);
     }

    public function admingetAllServices(){
        return view('admin.admin-get-all-services', [
            'adminServices' => Service::latest()->filter(request(['search']))->paginate(4),
        ]);
    }

    public function adminAddServiceItem($id, $serviceName){
        return view('admin.admin-add-serviceItem', compact('id', 'serviceName'));
    }

    public function adminStoreServiceItem(Request $request){

        //dd($request->all());

       // Validate the incoming request
       $validatedData = $request->validate([
        'itemName' => 'required|string|max:255',
        'price' => 'required|string|max:255',
        'itemDESC' => 'required',
        'phoneNo' => 'required|string|max:15',
        'location' => 'required|string|max:255',
        'itemImage.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:20000',
    ]);

    // Handle the file upload (if present)
    /*$imagePath = null;
    if ($request->hasFile('itemImage')) {
        $imagePath = $request->file('itemImage')->store('service_images', 'public');
    }*/

    // Custom validation for the number of files
    $files = $request->file('itemImage');
    if (count($files) > 4) {
        return back()->withErrors(['itemImage' => 'You can only upload a maximum of 4 images.']);
    }

    // Handle file uploads
    $imagePaths = [];
    if ($request->hasFile('itemImage')) {
        foreach ($request->file('itemImage') as $file) {
            // Store each image and get its path
            $imagePaths[] = $file->store('service_images', 'public');
        }
    }


    // Create the new service item and associate it with the service
    ServiceItem::create([
        'service_id' => $request->input('serviceID'),
        'itemName' => $validatedData['itemName'],
        'itemPrice' => $validatedData['price'],
        'itemDESC' => $validatedData['itemDESC'],
        'itemImage' => json_encode($imagePaths), // Store paths as JSON array
        'phoneNumber' => $validatedData['phoneNo'],
        'location' => $validatedData['location'],
    ]);
    

     // Redirect back with success message
     return redirect()->back()->with('success', 'Service item added successfully!');

    }

    public function mainpageSignedIn()
    {
        return view('mainpage', [
            'projects' => Project::latest()->filter(request(['search']))->paginate(4),
            'notifications' => Notification::latest()->get(),
        ]);

    }


    public function register_user()
    {
        return view('register');
    }

    public function main_dashboard()
    {
        return view('main-dashboard', [
            'products' => Product::latest()->filter(request(['search']))->paginate(6),
        ]);
    }

    public function store_accounts(Request $request)
    {
        $accountInfo = $request->validate([
            'user_role' => 'required',
            'customer_name' => 'nullable',
            'business_name' => 'nullable',
            'username' => ['required', Rule::unique('accounts', 'username')],
            'password' => 'required',
        ]);

        try {
            $acc = Account::create($accountInfo);
            Auth::guard('account')->login($acc);
            $request->session()->regenerateToken();
            return redirect('/main-dashboard')->with('login_success', 'Registered and logged in successfully');
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function business_profile()
    {
        return view('business.business-profile');
    }

    public function add_product()
    {
        return view('business.add-product');
    }

    public function my_posts()
    {
        return view('business.my-posts', [
            'products' => Product::latest()->filter(request(['search']))->paginate(6),
        ]);
    }

    public function view_feedbacks()
    {
        return view('business.view-feedbacks', [
            'feedbacks' => Feedback::latest()->paginate(5),
        ]);
    }

    public function invalidate(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('logout_message', 'Logged out successfully!');
    }

    public function edit_account(Request $request, Account $account)
    {
        $accountDetails = $request->validate([
            'business_name' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'address' => 'required',
            'profile' => 'nullable',
        ]);

        try {
            if ($request->hasFile('profile')) {
                $accountDetails['profile'] = $request->file('profile')->store('business_profile', 'public');
            }

            $account->update($accountDetails);
            return redirect()->back()->with('account_edited', 'Profile edied successfully!');
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function edit_pass_user(Request $request, Account $account)
    {
        $pass_user_details = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        try {
            $account->update($pass_user_details);
            return redirect()->back()->with('pass_user_edited', 'Credentials updated successfully!');
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function store_products(Request $request)
    {
        $productDetails = $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'product_picture' => 'required',
            'description' => 'required|max:300',
            'location' => 'required',
            'contact' => 'required',
        ]);
        try {
            if ($request->hasFile('product_picture')) {
                $productDetails['product_picture'] = $request->file('product_picture')->store('products', 'public');
            }

            Product::create($productDetails);
            return redirect()->back()->with('product_added', 'Product posted successfully!');
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function find_single_product($id)
    {
        return view('business.read-more', [
            'product' => Product::find($id),
        ]);
    }

    public function edit_rest_product(Request $request, Product $product)
    {
        $productDetails = $request->validate([
            'price' => 'required',
            // 'product_picture' => 'required',
            'product_name' => 'required',
        ]);

        try {

            if ($request->hasFile('product_picture')) {
                $productDetails['product_picture'] = $request->file('product_picture')->store('products', 'public');
            }

            $product->update($productDetails);
            return redirect()->back()->with('product_edited_full', 'Product post edited successfully!');
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function delete_product_post(Request $request, Product $product)
    {
        $product->delete();
        return redirect('/business/my-posts')->with('delete_message', 'Product deleted successfully!');
    }

    public function authenticate(Request $request)
    {
        $loginCredentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Attempt to log in with the 'account' guard first
    if (Auth::guard('account')->attempt(['username' => $loginCredentials['username'], 'password' => $loginCredentials['password']])) {
        $request->session()->regenerateToken();
        return redirect('/mainpage')->with('login_success', 'You are successfully logged in');
    } elseif (Auth::guard('web')->attempt($loginCredentials)) {
        $request->session()->regenerateToken();
        return redirect('/admin/admin-dashboard')->with('login_accepted', 'Admin logged in successfully');
    } else {
        return redirect()->back()->withErrors(['login_error' => 'Incorrect username or password. Please try again.']);
    }
    }

    public function personal_profile()
    {
        return view('personal-profile');
    }

    public function store_orders(Request $request)
    {
        $orderDetails = $request->validate([
            'price' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'product_name' => 'required',
            'product_picture' => 'required',
            'customer_name' => 'required',
            // 'company_name' => 'required',
            'quantity' => 'required',
        ]);

        try {
            Order::create($orderDetails);
            return redirect()->back()->with('order_placed', 'Order placed successfully!');
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function show_orders()
    {
        return view('my-orders', [
            'orders' => Order::latest()->paginate(3),
        ]);
    }

    public function send_feedbacks()
    {
        return view('feedbacks');
    }

    public function store_feedbacsk(Request $request)
    {
        $feedbacksFields = $request->validate([
            'delivery_feed' => 'required',
            'quality_feed' => 'required',
            'rate_feed' => 'required',
            'message' => 'required|max:300',
        ]);

        try {
            Feedback::create($feedbacksFields);
            return redirect()->back()->with('feedback_message', 'Feedbacks sent successfully!');
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function reset_pass()
    {
        return view('reset-password');
    }


    //ADMIN
    public function admin_dashboard()
    {
        return view('admin.admin-dashboard', [
            'product' => Product::latest()->paginate(6),
            'orders' => Order::latest()->filter(['search'])->paginate(6),
        ]);
    }

    public function view_single($id)
    {
        return view('admin.view-single-order', [
            'order' => Order::find($id),
        ]);
    }

    public function edit_status_order(Request $request, Order $order)
    {
        $orderDetails = $request->validate([
            'status' => 'required',
        ]);

        $order->update($orderDetails);
        return redirect()->back()->with('text_message', 'Status updated successfully!');
    }

    public function view_all_orders()
    {
        return view('admin.all-orders', [
            'orders' => Order::latest()->paginate(6),
        ]);
    }

    public function my_profile_admin()
    {
        return view('admin.my-profile');
    }

    public function edit_profile(Request $request, User $user)
    {
        $userData = $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'profile' => 'nullable',
        ]);

        if ($request->hasFile('profile')) {
            $userData['profile'] = $request->file('profile')->store('admin_profile', 'public');
        }
        $user->update($userData);
        return redirect()->back()->with('admin_profile_edited', 'Admin  profile updated successfully!');
    }

    public function edit_pass_username_admin(Request $request, User $user)
    {
        $userPassUser = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user->update($userPassUser);
        return redirect()->back()->with('pass_user_admin', 'Credentials updated successfully!');
    }

    public function show_feedbacks()
    {
        return view('admin.feedbacks', [
            'feedbacks' => Feedback::latest()->paginate(5),
        ]);
    }


    //GO LOGIN
    public function go_login()
    {
        return view('login');
    }

    public function add_project()
    {
        return view('admin.add-project');
    }

    // public function store_projects(Request $request){
    //     $projectDetails = $request->validate([
    //         'project_name' => 'required|string|max:255',
    //         'project_documentation' => 'required|file|mimes:pdf',
    //         'project_video' => 'nullable|file|mimetypes:video/mp4,video/x-msvideo,video/x-ms-wmv,video/avi',
    //     ]);

    //     if ($request->hasFile('project_documentation')) {
    //         $projectDetails['project_documentation'] = $request->file('project_documentation')->store('documentation', 'public');
    //     }

    //     if ($request->hasFile('project_video')) {
    //         $projectDetails['project_video'] = $request->file('project_video')->store('project_vid', 'public');
    //     }

    //     //Project::create($projectDetails);

    //     dd($request->all());
    //     //return redirect()->back()->with('project_posted','Project added successfully!');
    // }

    public function load_to_news()
    {
        return view('admin.news');
    }

    public function store_news(Request $request)
    {
        $newsDetails = $request->validate([
            'news_title' => 'required',
            'news_picture' => 'nullable',
            'description' => 'required',
        ]);

        if ($request->hasFile('news_picture')) {
            $newsDetails['news_picture'] = $request->file('news_picture')->store('news_pictures', 'public');
        }

        Notification::create($newsDetails);
        return redirect()->back()->with('news_message', 'News posted successfully!');
    }

    public function read_more($id)
    {
        return view('admin.read-more', [
            'project' => Project::find($id),
        ]);
    }

    //after loged in
    public function read_moreLogedIn($id)
    {
        return view('admin.read-moreLogedIn', [
            'project' => Project::find($id),
        ]);
    }


    public function store_my_orders(Request $request)
    {
        $orderDetailsPlace = $request->validate([
            'project_name' => 'required',
            'name' => 'required',
            'contact' => 'required',
        ]);

        Order::create($orderDetailsPlace);

        return redirect()->back()->with('order_placed_success', 'You ordered this project successfully, wait a few minutes for our call');
    }

    /*public function create_account(Request $request)
    {
        $accountUser = $request->validate([
            'customer_role' => 'required',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $accountSet = Account::create($accountUser);

        Auth::guard('account')->login($accountSet);

        return redirect('/')->with('login_success_msg', 'Account created successfully');
    }*/

    public function create_account(Request $request)
{
    // Validate input data
    $request->validate([
        'customer_role' => 'required',
        'name' => 'required',
        'username' => 'required',
        'password' => 'required|min:8',
    ]);

    // Check if the username already exists
    $usernameExists = Account::where('username', $request->input('username'))->exists();
    
    if ($usernameExists) {
        // If username exists, return with an error message
        return redirect()->back()->withErrors(['username' => 'Phone number already exists, login or register new one.'])->withInput();
    }

    // Create the new account
    $accountUser = $request->only(['customer_role', 'name', 'username', 'password']);
    //$accountUser['password'] = bcrypt($accountUser['password']); // Hash the password
    $accountUser['password'] = $accountUser['password'];
    $accountSet = Account::create($accountUser);

    // Log in the user
    Auth::guard('account')->login($accountSet);

    // Redirect to homepage with success message
    return redirect('/mainpage')->with('login_success_msg', 'Account created successfully');

}



//     public function store_projects(Request $request)
// {
//     \Log::info('Request received', $request->all());

//     $projectDetails = $request->validate([
//         'project_name' => 'required',
//         'project_video' => 'required|file|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:20000',
//         'project_picture' => 'required|file|mimetypes:application/pdf|max:10000',
//     ]);

//     \Log::info('Validation passed');

//     if ($request->hasFile('project_picture')) {
//         \Log::info('Project picture detected');
//         $projectDetails['project_picture'] = $request->file('project_picture')->store('pictures', 'public');
//         \Log::info('Project picture stored at: ' . $projectDetails['project_picture']);
//     } else {
//         \Log::info('No project picture detected');
//     }

//     if ($request->hasFile('project_video')) {
//         \Log::info('Project video detected');
//         $projectDetails['project_video'] = $request->file('project_video')->store('videos', 'public');
//         \Log::info('Project video stored at: ' . $projectDetails['project_video']);
//     } else {
//         \Log::info('No project video detected');
//     }

//     Project::create($projectDetails);
//     \Log::info('Project created successfully');

//     return redirect()->back()->with('project_posted', 'Project added successfully!');
// }


    public function store_projects(Request $request)
    {
        $projectDetails = $request->validate([
            'project_name' => 'required',
            'project_video' => 'required|file|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:40000',
            'project_picture' => 'required|file|mimetypes:application/pdf|max:40000',
        ]);

        if ($request->hasFile('project_picture')) {
            $projectDetails['project_picture'] = $request->file('project_picture')->store('pictures', 'public');
        }

        if ($request->hasFile('project_video')) {
            $projectDetails['project_video'] = $request->file('project_video')->store('videos', 'public');
        }

        Project::create($projectDetails);

        return redirect()->back()->with('project_posted', 'Project added successfully!');
    }

    public function view_all_projects(){
        return view('admin.projects',[
            'projects' => Project::latest()->filter(request(['search']))->paginate(10),
        ]);
    }

    public function single_project($id){
        return view('admin.more-about',[
            'project' => Project::find($id),
        ]);
    }

    public function single_order($id){
        return view('admin.view-action',[
            'order' => Order::find($id),
        ]);
    }

    public function order_delete(Request $request, Order $order){
        $order->delete();
        return redirect('/admin/admin-dashboard');
    }

    public function edit_status(Request $request, Order $order){
        $orderStatus = $request->validate([
            'status' => 'required',
        ]);

        $order->update($orderStatus);

        return redirect()->back();
    }

    public function edit_posted_project(Request $request, Project $project){
        $projectComponents = $request->validate([
            'project_name' => 'required',
            'project_video' => 'nullable',
            'project_picture' => 'nullable',
        ]);
        if($request->hasFile('project_video')){
            $projectComponents['project_video'] = $request->file('project_video')->store('videos','public');
        }
        if($request->hasFile('project_picture')){
            $projectComponents['project_picture'] = $request->file('project_picture')->store('pictures','public');
        }

        $project->update($projectComponents);

        // dd($request);
        return redirect()->back();
    }

    public function store_comments(Request $request){
        $feedbacksDetails = $request->validate([
            'message' => 'required',
        ]);

        Feedback::create($feedbacksDetails);

        return redirect()->back()->with('feedback_sent','Comment posted successfully!');
    }

    /*public function go_to_order(){
        return view('order-components',[
            'components' => Component::latest()->filter(request(['search']))->paginate(4),
        ]);
    }*/

    public function go_to_order()
{
    $components = Component::latest()->filter(request(['search']))->paginate(4);

    if (request()->ajax()) {
        return view('partials.components', compact('components'))->render(); // Render the partial view only
    }

    return view('order-components', compact('components')); // For non-AJAX, render full view
}

public function go_to_orderLogedIn()
{
    $components = Component::latest()->filter(request(['search']))->paginate(4);

    if (request()->ajax()) {
        return view('partials.components', compact('components'))->render(); // Render the partial view only
    }

    return view('order-componentsLogedIn', compact('components')); // For non-AJAX, render full view
}



    public function add_compoenent(){
        return view('admin.add-component');
    }

    public function store_components(Request $request)
    {
    $componentDetails = $request->validate([
        'component_name' => 'required',
        'component_price' => 'required',
        'component_picture.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
    ]);

    if ($request->hasFile('component_picture')) {
        foreach ($request->file('component_picture') as $comp) {
            $name = time() . '-' . $comp->getClientOriginalName();
            
             // Move the image to the public/images directory
             $comp->move(public_path('images'), $name);

            // Save the image name to the database
            Component::create([
                'component_name' => $request->input('component_name'),
                'component_price' => $request->input('component_price'),
                'component_picture' => $name,
            ]);
            
            // Component::create($componentDetails);
        }
    }

    return redirect()->back()->with('component_mesg', 'Component added successfully!');
    }

    public function order_component($id){
        return view('order-component',[
            'component' => Component::find($id),
        ]);
    }

    public function order_componentLogedIn($id){
        return view('order-componentLogedIn',[
            'component' => Component::find($id),
        ]);
    }

    public function store_component_orders(Request $request){
        $componentDetails = $request->validate([
            'quantity' => 'required',
            'contact'=> 'required',
            'component_name' => 'required',
            'price' => 'required',
            'total_price' => 'required',
        ]);

        Comporder::create($componentDetails);

        return redirect()->back()->with('component_order_msg','Component ordered successfully!');
    }

    public function view_components(){
        return view('admin.view-components',[
            'comporders' => Comporder::latest()->paginate(10),
        ]);
    }

    public function component_order($id){
        return view('admin.view-component-order',[
            'order' => Comporder::single($id),
        ]);
    }

    public function comp_order_status(Request $request, Comporder $order){
        $orderStatus = $request->validate([
            'status' => 'required',
        ]);

        $order->update($orderStatus);

        return redirect()->back()->with('updated_msg','Order updated successfully!');
    }

    public function delete_comp_order(Request $request, Comporder $order){
        $order->delete();
        return redirect('/admin/view-components')->with('comp_deleted','Component order deleted successfully!');
    }

    public function about(){
        return view('about');
    }

    public function aboutLogedIn(){
        return view('aboutLogedIn');
    }


    public function contact_us(){
        return view('contact');
    }

    public function our_news(){
        return view('news',[
            'notifications' => Notification::latest()->get(),
        ]);
    }

    public function logedInnews(){
        return view('logedInnews',[
            'notifications' => Notification::latest()->get(),
        ]);
    }


    public function submitOrder(Request $request)
    {
       // Validate the incoming request data
       $validatedData = $request->validate([
        'project_name' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'contact' => 'required|string|max:20',
        'status' => 'required|string|max:50',
    ]);

    // Create a new order with validated data
    Order::create($validatedData);

    // Redirect to a success page or return a response
    return redirect()->route('order.success')->with('success', 'Order submitted successfully!');
    }

    public function Services(){
        return view('services');
    }

    public function AdminServices(){
        return view('admin.add-service');
    }

    // Handle the form submission
    public function AdminAddService(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'serviceName' => 'required|string|max:255',
            'serviceDESC' => 'required',
            'serviceImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:20000',
        ]);
    
        // Handle the file upload
        if ($request->hasFile('serviceImage')) {
            $imagePath = $request->file('serviceImage')->store('service_images', 'public');
        }
    
        // Autogenerate the serviceID using UUID or random string
        $autogeneratedServiceID = Str::uuid(); // Generates a UUID
    
        // Create the service and save it to the database
        Service::create([
            'serviceName' => $validatedData['serviceName'],
            'serviceDESC' => $validatedData['serviceDESC'],
            'serviceImage' => $imagePath ?? null,
        ]);
    
        // Redirect to a success page or back to the form
        return redirect()->back()->with('success', 'Service added successfully!');
    }


    
}



