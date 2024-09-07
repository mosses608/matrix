const data = {
    combinedData :{
    dashboardWidgets: [
        {
            classes: "col-xl-3 col-sm-6 col-12",
            fill: "fill1",
            label: "Employees",
            value: 700,
            imgSrc: "assets/img/dash1.png"
        },
        {
            classes: "col-xl-3 col-sm-6 col-12",
            fill: "fill2",
            label: "Companies",
            value: 30,
            imgSrc: "assets/img/dash2.png"
        },
        {
            classes: "col-xl-3 col-sm-6 col-12",
            fill: "fill3",
            label: "Leaves",
            value: 9,
            imgSrc: "assets/img/dash3.png"
        },
        {
            classes: "col-xl-3 col-sm-6 col-12",
            fill: "fill4",
            label: "Salary",
            value: "$5.8M",
            imgSrc: "assets/img/dash4.png"
        }
    ],
    salaryByUnit: {
        title: "Total Salary By Unit",
        teamMembers: [
            {
                name: "Maria Cotton",
                skill: "PHP",
                imgSrc: "assets/img/profiles/avatar-03.jpg",
                alt: "avatar"
            },
            {
                name: "Linda Craver",
                skill: "IOS",
                imgSrc: "assets/img/profiles/avatar-04.jpg",
                alt: "avatar"
            },
            {
                name: "Jenni Sims",
                skill: "Android",
                imgSrc: "assets/img/profiles/avatar-06.jpg",
                alt: "avatar"
            },
            {
                name: "Danny",
                skill: "Design",
                imgSrc: "assets/img/profiles/avatar-11.jpg",
                alt: "avatar"
            }
        ],
        viewAllText: "View all",
        arrowSrc: "assets/img/right-arrow.png",
        arrowAlt: "arrow"
    },
    recentActivities: {
        title: "Recent Activities",
        activities: [
            {
                imgSrc: "assets/img/profiles/avatar-02.jpg",
                alt: "avatar",
                label: "Lorem ipsum dolor sit amet,",
                time: "2 hours ago"
            },
            {
                imgSrc: "assets/img/profiles/avatar-05.jpg",
                alt: "avatar",
                label: "Lorem ipsum dolor sit amet,",
                time: "3 hours ago"
            },
            // Add more activities as needed
        ],
        viewAllText: "View all",
        arrowSrc: "assets/img/right-arrow.png",
        arrowAlt: "arrow"
    },
    upcomingLeave: {
        title: "Your Upcoming Leave",
        dropdownAction: "Action",
        leaves: [
            { date: "Mon, 16 Dec 2021", isActiveClass: "leave-inactive" },
            { date: "Fri, 20 Dec 2021", isActiveClass: "leave-active" },
            { date: "Wed, 25 Dec 2021", isActiveClass: "leave-active" },
            { date: "Fri, 27 Dec 2021", isActiveClass: "leave-active" },
            { date: "Tue, 31 Dec 2021", isActiveClass: "leave-active" }
        ],
        viewAllText: "View all",
        viewAllLink: "leave.html",
        arrowSrc: "assets/img/right-arrow.png",
        arrowAlt: "arrow"
    }
  }
}



try{
const source = document.getElementById("dashboard-template").innerHTML;
const template = Handlebars.compile(source);
const renderedHtml = template(data);
document.querySelector('div.page-wrapper').innerHTML = renderedHtml;
} catch(error){
   console.error("An error occurred while rendering the Handlebars template:", error);
}

