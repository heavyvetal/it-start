<?php

namespace App\Models;

class CourseRepository
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    public function __construct()
    {
        $language = app()->getLocale();
        $this->title = 'title_' . $language;
        $this->description = 'description_' . $language;
    }

    public function getAllCourses()
    {
        $title = $this->title;

        foreach (Courses::all() as $course) {
            $courses[] = new CourseDescription(
                $course->$title,
                $course->image,
                $course->ages->age,
                $course->durations->duration,
                $course->name
            );
        }

        return empty($courses) ? [] : $courses;
    }

    public function getCourse($name)
    {
        $course = Courses::where('name', $name)->first();

        $title = $this->title;
        $description = $this->description;

        return new CourseDescription(
            $course->$title,
            $course->image,
            $course->ages->age,
            $course->durations->duration,
            $course->name,
            $course->$description
        );
    }
}
