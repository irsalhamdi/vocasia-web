<?php

namespace App\Controllers\Frontend;

use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Psr\Log\LoggerInterface;

class FrontendController extends ResourceController
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */

    protected $request;

    protected $helpers = ['response']; //jika ingin mengload helper silahkan dimasukan kedalam sini

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        //silahkan load semua model dibawah ini kalau bisa semua kompak disini semua

        $this->model_lesson = model('LessonModel');
        $this->model_instructor = model('DashboardInstructorModel');
        $this->model_section = model('SectionModel');
        $this->model_question = model('QuestionModel');
        $this->model_payment_balance = model('PaymentBalanceModel');
        $this->model_course = model('CoursesModel');
        $this->model_category = model('CategoryModel');
        $this->model_wishlist = model('WishlistModel');
        $this->model_users = model('UsersModel');
        $this->model_cart = model('CartModel');
        $this->model_enrol = model('EnrolModel');
        $this->model_users_social_link = model('UsersSocialLink');
        $this->model_users_detail = model('UsersDetailModel');
        $this->model_payment = model('PaymentModel');
        $this->model_watch = model('WatchHistoryModel');
        $this->model_affiliate = model('AffiliateModel');
        $this->model_payment_balance = model('PaymentBalanceModel');
        $this->model_guide_user = model('GuideUserInstructorModel');
        $this->model_banner = model('BannerModel');
        $this->model_comment = model('CommentModel');
        $this->model_review = model('ReviewModel');        
        $this->model_message_thread = model('MessageThreadModel');     
        $this->model_qna = model('QnaModel') ;      
        $this->model_qna_reply = model('QnaReplyModel') ;                
    }
}
