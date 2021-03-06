<?php

namespace App\Controllers\Backend;

use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use CodeIgniter\RESTful\ResourceController;

class BackendController extends ResourceController
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    protected $helpers = ['response'];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        //silahkan load semua model dibawah ini kalau bisa semua kompak disini semua

        $this->model_course = model('CoursesModel');
        $this->model_coupon = model('CouponModel');
        $this->model_users = model('UsersModel');
        $this->model_category = model('CategoryModel');
        $this->model_affiliate = model('AffiliateModel');
        $this->model_users_mitra = model('UsersMitraModel');
        $this->model_enrol = model('EnrolModel');
        $this->model_payment = model('PaymentModel');
        $this->model_community = model('CommunityModel');
        $this->model_lesson = model('LessonModel');
        $this->model_section = model('SectionModel');
        $this->model_payment_balance = model('PaymentBalanceModel');
        $this->model_setting = model('SettingModel');
        $this->model_frontend = model('FrontendModel');
        $this->model_banner = model('BannerModel');
        $this->model_workshop = model('WorkshopModel');
        $this->model_workshop_student = model('WorkshopStudentModel');        
    }
}
