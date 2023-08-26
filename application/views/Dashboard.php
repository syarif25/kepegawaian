 <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Dashboard Management</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Manage</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-xxl-9 box-col-12">
                <div class="row"> 
                  <div class="col-xxl-4 col-md-5">
                    <div class="card">
                      <div class="card-header card-no-border"> 
                        <div class="header-top"> 
                          <h5>Academic Performance</h5>
                          <div class="dropdown icon-dropdown">
                            <button class="btn dropdown-toggle" id="performance_dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="performance_dropdown"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday </a></div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0">
                        <div class="performance-wrap">
                          <div id="academic_performance-chart"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xxl-8 col-md-7">
                    <div class="card">
                      <div class="card-header card-no-border"> 
                        <div class="header-top"> 
                          <h5>School Performance</h5>
                          <div class="card-header-right-icon">
                            <div class="dropdown">
                              <button class="btn dropdown-toggle" id="viewButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">Today</button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="viewButton"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday</a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0">
                        <div class="school-performance-wrap">
                          <div id="chart-school-performance">           </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <div class="card widget-hover overflow-hidden">
                      <div class="card-header card-no-border pb-2">
                        <h5>Total Teachers</h5>
                      </div>
                      <div class="card-body pt-0 count-student">
                        <div class="school-wrapper"> 
                          <div class="school-header">
                            <h4 class="txt-secondary">1,098</h4>
                            <div class="d-flex gap-1 align-items-center flex-wrap pt-xxl-0 pt-2"><i class="icon-arrow-down f-light"></i><span class="f-w-500 f-light">-3.7%</span>
                              <p class="text-muted">than last month</p>
                            </div>
                          </div>
                          <div class="school-body"> <img src="<?php echo base_url() ?>assets/images/dashboard-7/icon-2.svg" alt="total teachers">
                            <div class="right-line"><img src="<?php echo base_url() ?>assets/images/dashboard-7/line.png" alt="line"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <div class="card widget-hover overflow-hidden">
                      <div class="card-header card-no-border pb-2">
                        <h5>Total Events</h5>
                      </div>
                      <div class="card-body pt-0 count-student">
                        <div class="school-wrapper"> 
                          <div class="school-header">
                            <h4 class="txt-success">890</h4>
                            <div class="d-flex gap-1 align-items-center flex-wrap pt-xxl-0 pt-2"><i class="icon-arrow-up f-light"></i><span class="f-w-500 f-light">+6.7%</span>
                              <p class="text-muted">than last month</p>
                            </div>
                          </div>
                          <div class="school-body"> <img src="<?php echo base_url() ?>assets/images/dashboard-7/icon4.svg" alt="total events">
                            <div class="right-line"><img src="<?php echo base_url() ?>assets/images/dashboard-7/line.png" alt="line"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card widget-hover overflow-hidden">
                      <div class="card-header card-no-border pb-2">
                        <h5>Invoice Status</h5>
                      </div>
                      <div class="card-body pt-0 count-student">
                        <div class="school-wrapper"> 
                          <div class="school-header">
                            <h4 class="txt-warning">890</h4>
                            <div class="d-flex gap-1 align-items-center flex-wrap pt-xxl-0 pt-2"><i class="icon-arrow-up f-light"></i><span class="f-w-500 f-light">+2.0%</span>
                              <p class="text-muted">than last month</p>
                            </div>
                          </div>
                          <div class="school-body"> <img src="<?php echo base_url() ?>assets/images/dashboard-7/icon-3.svg" alt="Invoice status">
                            <div class="right-line"><img src="<?php echo base_url() ?>assets/images/dashboard-7/line.png" alt="line"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-sm-6 box-col-5">
                    <div class="card height-equal">
                      <div class="card-header card-no-border"> 
                        <div class="header-top"> 
                          <h5>Income</h5>
                          <div class="dropdown icon-dropdown">
                            <button class="btn dropdown-toggle" id="income_dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="income_dropdown"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday </a></div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0">
                        <div class="income-wrapper">
                          <ul> 
                            <li>
                              <div class="income-dot dot-primary"></div><span class="text-muted">Income</span>
                              <h6>$3,990.23    </h6>
                            </li>
                            <li> 
                              <div class="income-dot dot-warning"></div><span class="text-muted">Spending</span>
                              <h6>$5,071.43</h6>
                            </li>
                            <li> 
                              <div class="income-dot dot-success"></div><span class="text-muted">Profit</span>
                              <h6>$4000.0</h6>
                            </li>
                          </ul>
                          <div class="main-income-chart">
                            <div id="income_chart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-8 col-12 order-1 order-xl-0 box-col-7">
                    <div class="card height-equal">
                      <div class="card-header pb-0">
                        <div class="performance-wrapper">
                          <div class="performance-left">
                            <ul class="nav nav-tabs border-tab border-0 mb-0" id="topline-tab" role="tablist">
                              <li class="nav-item"><a class="nav-link active nav-border" id="toplinetopoverview-tab" data-bs-toggle="tab" href="#toplinetopoverview" role="tab" aria-selected="true">Overview</a></li>
                              <li class="nav-item"><a class="nav-link nav-border" id="toplinetopperformance-tab" data-bs-toggle="tab" href="#toplinetopperformance" role="tab" aria-selected="false">Performance</a></li>
                            </ul>
                          </div>
                          <div class="performance-right"> 
                            <p class="mb-0">28-02-2023</p><i class="fa fa-calendar txt-primary"></i>
                          </div>
                        </div>
                      </div>
                      <div class="card-body"> 
                        <div class="row g-md-0 g-4">
                          <div class="col-xl-5 col-md-4 box-col-12">
                            <div class="attendance-chart">
                              <div id="chart_current_academic"></div>
                            </div>
                          </div>
                          <div class="col-xl-7 col-md-8 box-col-none">
                            <div class="row g-3">
                              <div class="col-xl-12"> 
                                <div class="light-card attendance-card widget-hover">
                                  <div class="left-overview-content">
                                    <div class="svg-box"><img src="<?php echo base_url() ?>assets/images/dashboard-7/attendance/1.png" alt="homework"></div>
                                  </div>
                                  <div class="right-overview-content">
                                    <div> 
                                      <h6>Homework</h6><span class="text-muted text-ellipsis">Bring Something into the Classroom...</span>
                                    </div>
                                    <div class="d-flex marks-count">
                                      <h5>89/<sub class="text-muted">100</sub></h5>
                                      <div class="d-flex justify-content-center align-items-center"><i class="icon-arrow-up txt-success pe-2 f-w-600"></i><span class="txt-success f-w-500">+80%</span></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-xl-12"> 
                                <div class="light-card attendance-card widget-hover">
                                  <div class="left-overview-content">
                                    <div class="svg-box"><img src="<?php echo base_url() ?>assets/images/dashboard-7/attendance/2.png" alt="tests"></div>
                                  </div>
                                  <div class="right-overview-content">
                                    <div> 
                                      <h6>Tests</h6><span class="text-muted text-ellipsis">These 5 study tips can help you take...</span>
                                    </div>
                                    <div class="d-flex marks-count">
                                      <h5>95/<sub class="text-muted">100</sub></h5>
                                      <div class="d-flex justify-content-center align-items-center"><i class="icon-arrow-up txt-success pe-2 f-w-600"></i><span class="txt-success f-w-500">+97%</span></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-xl-12"> 
                                <div class="light-card attendance-card widget-hover">
                                  <div class="left-overview-content">
                                    <div class="svg-box"><img src="<?php echo base_url() ?>assets/images/dashboard-7/attendance/3.png" alt="attendance"></div>
                                  </div>
                                  <div class="right-overview-content">
                                    <div> 
                                      <h6>Attendance</h6><span class="text-muted text-ellipsis">Student absence reduces even best...</span>
                                    </div>
                                    <div class="d-flex marks-count">
                                      <h5>92/<sub class="text-muted">100</sub></h5>
                                      <div class="d-flex justify-content-center align-items-center"><i class="icon-arrow-up txt-success pe-2 f-w-600"></i><span class="txt-success f-w-500">+94%</span></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-sm-6 order-0">
                    <div class="card height-equal">
                      <div class="card-header card-no-border"> 
                        <div class="header-top"> 
                          <h5>Event Calendar</h5>
                          <div class="dropdown icon-dropdown">
                            <button class="btn dropdown-toggle" id="calender_dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="calender_dropdown"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday </a></div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0">
                        <div class="default-datepicker"> 
                          <div class="datepicker-here" data-language="en"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-8 order-2">
                    <div class="card height-equal">
                      <div class="card-header card-no-border"> 
                        <div class="header-top"> 
                          <h5>Today's Task</h5>
                          <div class="dropdown icon-dropdown">
                            <button class="btn dropdown-toggle" id="task_dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="task_dropdown"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday </a></div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0 task-table">
                        <div class="main-task"><span class="text-muted">2 Task <span class="txt-success">completed  <span class="text-muted"> out of 12</span></span></span>
                          <div class="progress task-progress">
                            <div class="progress-bar w-50 bg-success" role="progressbar" aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                        <div class="recent-table table-responsive currency-table task-table"> 
                          <table class="table"> 
                            <tbody class="main-task-wrapper">
                              <tr> 
                                <td>
                                  <div class="d-flex">
                                    <div class="form-check checkbox-width checkbox checkbox-primary mb-0">
                                      <input class="from-check-input" id="checkbox-task-1" type="checkbox" checked="">
                                      <label class="form-check-label" for="checkbox-task-1"> </label>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 justify-content-center">
                                      <div> 
                                        <h6 class="pb-1">Teacher Meeting & Campus Tour</h6>
                                        <ul class="task-icons">
                                          <li> <span class="text-muted">Class Number 10</span></li>
                                          <li class="f-light flex-wrap">
                                            <svg class="fill-icon fill-primary">
                                              <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#clock"></use>
                                            </svg><span>11 : 00 AM</span>
                                          </li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td> 
                                  <button class="btn badge-light-primary">In Progress</button>
                                </td>
                                <td class="icons-box">
                                  <div class="d-flex align-items-center gap-2">
                                    <div class="square-white"><i class="fa fa-pencil"></i></div>
                                    <div class="square-white"><i class="fa fa-trash"></i></div>
                                    <div class="square-white"><i class="fa fa-print"></i></div>
                                  </div>
                                </td>
                                <td class="icons-box-2 ps-0">
                                  <div class="open-options">
                                    <div class="square-white dropdown-toggle" role="main" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></div>
                                    <ul class="dropdown-menu dropdown-block dropdown-menu-end">
                                      <li><a class="dropdown-item square-white border-top-0" href="javascript:void(0)"><i class="fa fa-pencil"></i></a></li>
                                      <li><a class="dropdown-item square-white border-top-0" href="javascript:void(0)"><i class="fa fa-trash"></i></a></li>
                                      <li><a class="dropdown-item square-white border-top-0" href="javascript:void(0)"><i class="fa fa-print"></i></a></li>
                                    </ul>
                                  </div>
                                </td>
                              </tr>
                              <tr class="light-card">
                                <td>
                                  <div class="d-flex">
                                    <div class="form-check checkbox-width checkbox checkbox-primary mb-0">
                                      <input class="from-check-input" id="checkbox-task-2" type="checkbox">
                                      <label class="form-check-label" for="checkbox-task-2"> </label>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 justify-content-center">
                                      <div> 
                                        <h6 class="pb-1">Exercise 1, 2 and Learn more Books</h6>
                                        <ul class="task-icons">
                                          <li> <span class="text-muted">Class Number 11</span></li>
                                          <li class="f-light flex-wrap">
                                            <svg class="fill-icon fill-clock">
                                              <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#clock"></use>
                                            </svg><span>01 : 00 PM</span>
                                          </li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td> 
                                  <button class="btn badge-light-success">Done</button>
                                </td>
                                <td class="icons-box">
                                  <div class="d-flex align-items-center gap-2">
                                    <div class="square-white"><i class="fa fa-pencil"></i></div>
                                    <div class="square-white"><i class="fa fa-trash"></i></div>
                                    <div class="square-white"><i class="fa fa-print"></i></div>
                                  </div>
                                </td>
                                <td class="icons-box-2 ps-0">
                                  <div class="open-options">
                                    <div class="square-white dropdown-toggle" role="main" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></div>
                                    <ul class="dropdown-menu dropdown-block dropdown-menu-end">
                                      <li><a class="dropdown-item square-white border-top-0" href="javascript:void(0)"><i class="fa fa-pencil"></i></a></li>
                                      <li><a class="dropdown-item square-white border-top-0" href="javascript:void(0)"><i class="fa fa-trash"></i></a></li>
                                      <li><a class="dropdown-item square-white border-top-0" href="javascript:void(0)"><i class="fa fa-print"></i></a></li>
                                    </ul>
                                  </div>
                                </td>
                              </tr>
                              <tr> 
                                <td>
                                  <div class="d-flex">
                                    <div class="form-check checkbox-width checkbox checkbox-primary mb-0">
                                      <input class="from-check-input" id="checkbox-task-3" type="checkbox">
                                      <label class="form-check-label" for="checkbox-task-3"> </label>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 justify-content-center">
                                      <div> 
                                        <h6 class="pb-1">Guest Lecture and Parent Meeting</h6>
                                        <ul class="task-icons">
                                          <li> <span class="text-muted">Class Number 8</span></li>
                                          <li class="f-light flex-wrap">
                                            <svg class="fill-icon fill-clock">
                                              <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#clock"></use>
                                            </svg><span>09 : 00 AM</span>
                                          </li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td> 
                                  <button class="btn badge-light-success">Done</button>
                                </td>
                                <td class="icons-box">
                                  <div class="d-flex align-items-center gap-2">
                                    <div class="square-white"><i class="fa fa-pencil"></i></div>
                                    <div class="square-white"><i class="fa fa-trash"></i></div>
                                    <div class="square-white"><i class="fa fa-print"></i></div>
                                  </div>
                                </td>
                                <td class="icons-box-2 ps-0">
                                  <div class="open-options">
                                    <div class="square-white dropdown-toggle" role="main" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></div>
                                    <ul class="dropdown-menu dropdown-block dropdown-menu-end">
                                      <li><a class="dropdown-item square-white border-top-0" href="javascript:void(0)"><i class="fa fa-pencil"></i></a></li>
                                      <li><a class="dropdown-item square-white border-top-0" href="javascript:void(0)"><i class="fa fa-trash"></i></a></li>
                                      <li><a class="dropdown-item square-white border-top-0" href="javascript:void(0)"><i class="fa fa-print"></i></a></li>
                                    </ul>
                                  </div>
                                </td>
                              </tr>
                              <tr class="light-card">
                                <td>
                                  <div class="d-flex">
                                    <div class="form-check checkbox-width checkbox checkbox-primary mb-0">
                                      <input class="from-check-input" id="checkbox-task-4" type="checkbox">
                                      <label class="form-check-label" for="checkbox-task-4"> </label>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 justify-content-center">
                                      <div> 
                                        <h6 class="pb-1">Meetup meeting with new Client</h6>
                                        <ul class="task-icons">
                                          <li> <span class="text-muted">Class Number 11</span></li>
                                          <li class="f-light flex-wrap">
                                            <svg class="fill-icon fill-primary">
                                              <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#clock"></use>
                                            </svg><span>02 : 00 PM</span>
                                          </li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td> 
                                  <button class="btn badge-light-primary">In Progress</button>
                                </td>
                                <td class="icons-box ps-2">
                                  <div class="d-flex align-items-center gap-2">
                                    <div class="square-white"><i class="fa fa-pencil"></i></div>
                                    <div class="square-white"><i class="fa fa-trash"></i></div>
                                    <div class="square-white"><i class="fa fa-print">     </i></div>
                                  </div>
                                </td>
                                <td class="icons-box-2 ps-0">
                                  <div class="open-options">
                                    <div class="square-white dropdown-toggle" role="main" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></div>
                                    <ul class="dropdown-menu dropdown-block dropdown-menu-end">
                                      <li><a class="dropdown-item square-white border-top-0" href="javascript:void(0)"><i class="fa fa-pencil"></i></a></li>
                                      <li><a class="dropdown-item square-white border-top-0" href="javascript:void(0)"><i class="fa fa-trash"></i></a></li>
                                      <li><a class="dropdown-item square-white border-top-0" href="javascript:void(0)"><i class="fa fa-print">       </i></a></li>
                                    </ul>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3 d-xxl-block d-none box-col-none">
                <div class="row"> 
                  <div class="col-xl-12 d-xl-block d-none">
                    <div class="card">
                      <div class="card-header card-no-border pb-4">
                        <h5>Increase your knowledge by Learning!</h5>
                      </div>
                      <div class="card-body pt-0 position-relative pb-0 pe-0 increase-content">
                        <div class="knowledge-wrapper">
                          <div> 
                            <p class="f-light">The essential way to learn about anything is by reading quality literature!</p>
                            <button class="btn btn-primary btn-hover-effect f-w-500 knowledge-btn" type="button">Learn More</button>
                          </div>
                          <div class="knowledgebase-wrapper"><img class="knowledge-img img-fluid w-100" src="<?php echo base_url() ?>assets/images/dashboard-7/knowledge-base.png" alt="knowledge-base"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 notification box-col-6 d-xl-block d-none">
                    <div class="card">
                      <div class="card-header card-no-border"> 
                        <div class="header-top"> 
                          <h5>Notice Board</h5>
                          <div class="dropdown icon-dropdown">
                            <button class="btn dropdown-toggle" id="notice_dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="notice_dropdown"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday </a></div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0 notice-board">
                        <ul> 
                          <li class="d-flex">
                            <div class="activity-dot-primary"></div>
                            <div class="ms-3">
                              <p class="d-flex mb-2"><span class="date-content light-background">16 Feb, 2023</span></p>
                              <h6>We have over 25 years of experience. We've rented more than 250 properties and won awards.<span class="dot-notification"></span></h6>
                              <p class="f-light">Jennyfar Lopez / 5 min ago<span class="badge alert-light-success txt-success ms-2 f-w-600">New</span></p>
                            </div>
                          </li>
                          <li class="d-flex">
                            <div class="activity-dot-secondary"></div>
                            <div class="ms-3">
                              <p class="d-flex mb-2"><span class="date-content light-background">17 Feb, 2023</span></p>
                              <h6>Drawing Competition, Story Telling Competition, Craft and Creativity & Dance Competition<span class="dot-notification"></span></h6>
                              <p class="f-light">Rubi Rao / 10 min ago</p>
                            </div>
                          </li>
                          <li class="d-flex">
                            <div class="activity-dot-success"></div>
                            <div class="ms-3">
                              <p class="d-flex mb-2"><span class="date-content light-background">18 Feb, 2023</span></p>
                              <h6>Announces a series of Parent Education Webinars for connected parents<span class="dot-notification"></span></h6>
                              <p class="f-light">Jenny Wilson / 1 hr ago</p>
                            </div>
                          </li>
                          <li class="d-flex pb-0">
                            <div class="activity-dot-warning"></div>
                            <div class="ms-3">
                              <p class="d-flex mb-2"><span class="date-content light-background">19 Feb, 2023</span></p>
                              <h6>Rakhi Making Competition  & Independence day and Investiture Ceremony<span class="dot-notification"></span></h6>
                              <p class="f-light">Cameron Williamson / 10 min ago</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 d-xl-block d-none">
                    <div class="card">
                      <div class="card-header card-no-border"> 
                        <div class="header-top"> 
                          <h5>Student's Leader</h5>
                          <div class="dropdown icon-dropdown">
                            <button class="btn dropdown-toggle" id="students_dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="students_dropdown"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday </a></div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0">
                        <div class="student-leader-wrapper">
                          <div class="student-leader-content light-card"><img src="<?php echo base_url() ?>assets/images/dashboard-7/attendance/student-leader/rank-1.svg" alt="rank-1"><img class="leader-img" src="<?php echo base_url() ?>assets/images/dashboard-7/attendance/student-leader/user-1.jpg" alt="user 1">
                            <div class="leader-content-height">
                              <h6 class="pb-1">Brooklyn </h6><span class="text-muted">Helping Other</span>
                            </div>
                          </div>
                          <div class="student-leader-content light-card"><img src="<?php echo base_url() ?>assets/images/dashboard-7/attendance/student-leader/rank-2.svg" alt="rank-2"><img class="leader-img" src="<?php echo base_url() ?>assets/images/dashboard-7/attendance/student-leader/user-2.jpg" alt="user 2">
                            <div class="leader-content-height">
                              <h6 class="pb-1">Jenny Wilson</h6><span class="text-muted">Game Winner</span>
                            </div>
                          </div>
                          <div class="student-leader-content light-card"><img src="<?php echo base_url() ?>assets/images/dashboard-7/attendance/student-leader/rank-3.svg" alt="rank-2"><img class="leader-img" src="<?php echo base_url() ?>assets/images/dashboard-7/attendance/student-leader/user-3.jpg" alt="user 3">
                            <div class="leader-content-height">
                              <h6 class="pb-1">Savannah</h6><span class="text-muted">Great Job!</span>
                            </div>
                          </div>
                          <div class="student-leader-content">
                            <h5>4<sup>th</sup></h5><img class="leader-img" src="<?php echo base_url() ?>assets/images/dashboard-7/attendance/student-leader/user-4.jpg" alt="user 4">
                            <div class="leader-content-height">
                              <h6 class="pb-1">Esther Howard</h6><span class="text-muted">Best Developer</span>
                            </div>
                          </div>
                          <div class="student-leader-content border-0 pb-0">
                            <h5>5<sup>th</sup></h5><img class="leader-img" src="<?php echo base_url() ?>assets/images/dashboard-7/attendance/student-leader/user-5.jpg" alt="user 5">
                            <div class="leader-content-height">
                              <h6 class="pb-1">Ralph Edwards</h6><span class="text-muted">Best Designer              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->