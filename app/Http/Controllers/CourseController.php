<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Course;
use App\Models\Module;
use App\Models\Content;

class CourseController extends Controller
{


    public function index()
    {
        $courses = Course::with('modules.contents', 'contents', 'category')->latest()->get();
        return view('admin.courses.index', compact('courses'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.courses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $course = Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        // Save modules and their contents
        if ($request->has('modules')) {
            foreach ($request->modules as $moduleIndex => $moduleData) {
                $module = Module::create([
                    'course_id' => $course->id,
                    'title' => $moduleData['title'],
                ]);

                if (isset($moduleData['contents'])) {
                    foreach ($moduleData['contents'] as $contentIndex => $content) {
                        $videoFilePath = null;

                        // Video File Upload
                        if ($request->hasFile("modules.{$moduleIndex}.contents.{$contentIndex}.video_file")) {
                            $videoFile = $request->file("modules.{$moduleIndex}.contents.{$contentIndex}.video_file");
                            $videoFilePath = $videoFile->store('videos', 'public');
                        }

                        // Store content row
                        Content::create([
                            'course_id'     => $course->id,
                            'module_id'     => $module->id,
                            'title'         => $content['title'] ?? null,
                            'video_url'     => $content['video_url'] ?? null,
                            'video_file'    => $videoFilePath,
                            'video_length'  => $content['video_length'] ?? null,
                        ]);
                    }
                }
            }
        }

        return redirect()->route('courses.create')->with('success', 'Course Created Successfully!');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        foreach ($course->modules as $mod) {
            $mod->contents()->delete();
            $mod->delete();
        }
        $course->contents()->delete();
        $course->delete();

        return back()->with('success', 'Course deleted successfully!');
    }



}
