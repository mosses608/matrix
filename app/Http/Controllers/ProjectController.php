<?php 

use Illuminate\Http\Request;
use App\Models\Project;
// use App\Models\Project; // Ensure the Project model is imported

class ProjectController extends BaseController
{
    public function store_projects(Request $request)
    {
        // Validate the input data
        $projectDetails = $request->validate([
            'project_name' => 'required|string|max:255',
            'project_picture' => 'required|file|mimes:pdf',
            'project_video' => 'required|file|mimetypes:video/mp4,video/x-msvideo,video/x-ms-wmv,video/avi',
        ]);

        // Handle file uploads
        if ($request->hasFile('project_picture')) {
            $projectDetails['project_picture'] = $request->file('project_picture')->store('pictures', 'public');
        }

        if ($request->hasFile('project_video')) {
            $projectDetails['project_video'] = $request->file('project_video')->store('videos', 'public');
        }

        // Create the project
        Project::create($projectDetails);

        // Debugging purpose
        dd($projectDetails);

        // Uncomment after debugging
        // return redirect()->back()->with('project_posted', 'Project added successfully!');
    }
}
