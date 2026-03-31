<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function latestUpdate()
    {
        $posts = Post::orderBy("created_at", "desc")->paginate(10);
        return view("pages.allUpdate", compact("posts"));
    }
    public function vacancy_Notification()
    {
        $posts = Post::where('isVacancy', true)->latest ()->paginate(10);
        
        return view("pages.allUpdate", compact("posts"));
        // return view("pages.vacancyNotifications");
    }
    public function results()
    {
        return view("pages.results");
    }

    public function admitCard()
    {
        return view("pages.admitCard");
    }
    public function resource()
    {
        return view("pages.studyResource");
    }
    public function departmentWise(string $dept)
    {
        // Normalize input (important for production)
        $dept = strtolower(trim($dept));

        // Centralized department data (single source of truth)
        $departments = [
            "ssc" => [
                "title" => "SSC",
                "description" => "Staff Selection Commission (SSC) recruits Group B and C posts in ministries and departments. Popular exams include CGL, CHSL, and MTS."
            ],
            "railway" => [
                "title" => "Railway",
                "description" => "Railway Recruitment Board (RRB) conducts exams like NTPC, ALP, JE, and Group D for Indian Railways."
            ],
            "bank" => [
                "title" => "Banking",
                "description" => "Banking exams in India are conducted by IBPS, SBI, and RBI for roles like PO, Clerk, and Specialist Officers."
            ],
            "defence" => [
                "title" => "Defence",
                "description" => "Defence exams include NDA, CDS, AFCAT, and others for recruitment into the Indian Army, Navy, and Air Force."
            ],
            "civilservice" => [
                "title" => "Civil Services",
                "description" => "Civil Services exams conducted by UPSC include IAS, IPS, IFS, and other central services."
            ],
        ];

        // Default fallback
        $default = [
            "title" => "All Departments",
            "description" => "Explore job opportunities across SSC, Railway, Banking, Defence, and Civil Services."
        ];

        // Get department data or fallback
        $extraData = $departments[$dept] ?? $default;

        // Fetch posts (with safe fallback)
        $posts = Post::where('department', $dept)
            // ->latest()
            ->paginate(10);

        // Optional: if no posts & invalid dept → show all posts
        if ($posts->isEmpty() && !array_key_exists($dept, $departments)) {
            $posts = Post::latest()->paginate(10);
        }

        return view('pages.departmentWise', compact('posts', 'extraData'));
    }
}
