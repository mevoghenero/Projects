<?php

namespace App\Repositories;


use App\Repositories\Admin\AdminRepository;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Repositories\Authentication\UserAuthentication;
use App\Repositories\Authentication\UserAuthenticationInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Student\StudentRepository;
use App\Repositories\Student\StudentRepositoryInterface;
use App\Repositories\Subject\SubjectRepository;
use App\Repositories\Subject\SubjectRepositoryInterface;
use App\Respositories\Tutor\TutorRespository;
use App\Respositories\Tutor\TutorRespositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bind the interface to an implementation repository class
     */
    public function register()
    {
        $this->app->bind(
            UserAuthenticationInterface::class,
            UserAuthentication::class
        );

        $this->app->bind(
            StudentRepositoryInterface::class,
            StudentRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            SubjectRepositoryInterface::class,
            SubjectRepository::class
        );

         $this->app->bind(
            TutorRespositoryInterface::class,
            TutorRespository::class
         );

         $this->app->bind(
            AdminRepositoryInterface::class,
            AdminRepository::class
         );

        
    }
}