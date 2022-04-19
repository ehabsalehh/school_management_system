<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            'App\Interfaces\ClassroomRepositoryInterface',
            'App\Repositories\ClassroomRepository');
            $this->app->bind(
                'App\Interfaces\GradeRepositoryInterface',
                'App\Repositories\GradeRepository');
                $this->app->bind(
                    'App\Interfaces\SectionRepositoryInterface',
                    'App\Repositories\SectionRepository');
        $this->app->bind(
            'App\Interfaces\TeacherRepositoryInterface',
            'App\Repositories\TeacherRepository');
            // bind student interface 
            $this->app->bind(
                'App\Interfaces\StudentRepositoryInterface',
                'App\Repositories\StudentRepository');
            $this->app->bind(
                'App\Interfaces\StudentPromotionRepositoryInterface',
                'App\Repositories\StudentPromotionRepository');
            $this->app->bind(
                'App\Interfaces\StudentGraduatedRepositoryInterface',
                'App\Repositories\StudentGraduatedRepository');
            $this->app->bind(
                'App\Interfaces\FeesRepositoryInterface',
                'App\Repositories\FeesRepository');
            $this->app->bind(
                'App\Interfaces\FeeInvoicesRepositoryInterface',
                'App\Repositories\FeeInvoicesRepository');
                $this->app->bind(
                    'App\Interfaces\ReceiptStudentsRepositoryInterface',
                    'App\Repositories\ReceiptStudentsRepository');
                $this->app->bind(
                    'App\Interfaces\ProcessingFeeRepositoryInterface',
                    'App\Repositories\ProcessingFeeRepository');
                $this->app->bind(
                    'App\Interfaces\PaymentRepositoryInterface',
                    'App\Repositories\PaymentRepository');
                    $this->app->bind(
                        'App\Interfaces\AttendanceRepositoryInterface',
                        'App\Repositories\AttendanceRepository');
                    $this->app->bind(
                        'App\Interfaces\SubjectRepositoryInterface',
                        'App\Repositories\SubjectRepository');
                    $this->app->bind(
                        'App\Interfaces\QuizzRepositoryInterface',
                        'App\Repositories\QuizzRepository');
                    $this->app->bind(
                        'App\Interfaces\QuestionRepositoryInterface',
                        'App\Repositories\QuestionRepository');
                    $this->app->bind(
                        'App\Interfaces\LibraryRepositoryInterface',
                        'App\Repositories\LibraryRepository');
                    $this->app->bind(
                        'App\Interfaces\Teacher\AttendanceRepositoryInterface',
                        'App\Repositories\Teacher\AttendanceRepository');
    }
    
}
