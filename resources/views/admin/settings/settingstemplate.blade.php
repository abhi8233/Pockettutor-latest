@extends('layouts.adminApp')

@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-email-outline" aria-hidden="true"></i>
            <span class="ps-1">Email Template</span>
        </label>
    </div>
    <div class="student-list email-template bg-white p-3 pt-0 px-0 mt-4 pb-5">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <div>Student Email Template</div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="super-admin" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Super Admin</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="student-tab" data-bs-toggle="tab" data-bs-target="#student" type="button" role="tab" aria-controls="student" aria-selected="false">Student</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tutor-tab" data-bs-toggle="tab" data-bs-target="#tutor" type="button" role="tab" aria-controls="tutor" aria-selected="false">Tutor</button>
                </li>
            </ul>
        </ul>
        <div class="tab-content tab-main-common" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="super-admin">

                <div class="accordion mt-2" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                <div class="d-flex pt-width-p-100 justify-content-between align-items-center">
                                    <div>
                                        Subscription Reminder
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    </div>
                                </div>

                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <div class="box-shadow p-3 mt-3 mb-3 pt-border-radius-px-3">
                                    <textarea rows="4" class="pt-width-p-100">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </textarea>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button class="btn text-decoration-none common-btn pt-width-p-30">
                                        Save Settings
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                Accordion Item #2
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <div class="box-shadow p-3 mt-3 mb-3 pt-border-radius-px-3">
                                    <textarea rows="4" class="pt-width-p-100">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </textarea>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button class="btn text-decoration-none common-btn pt-width-p-30">
                                        Save Settings
                                    </button>
                                </div>.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <div class="box-shadow p-3 mt-3 mb-3 pt-border-radius-px-3">
                                    <textarea rows="4" class="pt-width-p-100">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </textarea>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button class="btn text-decoration-none common-btn pt-width-p-30">
                                        Save Settings
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="student" role="tabpanel" aria-labelledby="student-tab">
                Student
            </div>
            <div class="tab-pane fade" id="tutor" role="tabpanel" aria-labelledby="tutor-tab">
                Tutor
            </div>
        </div>

    </div>
</div>
@endsection