<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index($slug)
    {
        $course = Course::where('slug', '=', $slug);

        if ($course) {
            return new CourseResource($course->first());
        } else {
            return response()->json(['data' => [
                'errors' => [
                    'root' => 'This course does not exist.'
                ],
                'redirect' => true
            ]]);
        }
    }

    public function all()
    {
        return response()->json(['data' => [
            'courses' => Course::all()
        ]]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2',
            'description' => 'required|min:2',
            'slug' => 'required|min:2|unique:courses',
            'is_private' => 'required'
        ]);

        $course = Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => $request->slug,
            'is_private' => $request->is_private
        ]);

        if ($course) {
            return response()->json(['data' => [
                'success' => true,
                'course' => $course
            ]]);
        }
    }

    public function update(Request $request)
    {

    }
}
