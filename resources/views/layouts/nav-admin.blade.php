<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-sidebar="light"
  data-sidebar-size="sm-hover" data-sidebar-image="none" data-preloader="enable" data-bs-theme="light"
  data-layout-width="fluid" data-layout-position="scrollable" data-layout-style="default" data-topbar="light"
  data-sidebar-visibility="show">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
    integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  {{-- IMPORT FONT --}}
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
    rel="stylesheet">

  {{-- IMPORT CSS --}}
  <link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">
  <link rel="stylesheet" href="{{ asset('css/global/global.css') }}">

  <!-- jsvectormap css -->
  <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

  <!--Swiper slider css-->
  <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- Layout config Js -->
  <script src="{{ asset('assets/js/layout.js') }}"></script>
  <!-- Bootstrap Css -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- custom Css-->
  <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
  <!-- Begin page -->
  <div id="layout-wrapper">

    <header id="page-topbar">
      <div class="layout-width">
        <div class="navbar-header">
          <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box horizontal-logo">
              <a href="index.html" class="logo logo-dark">
                <span class="logo-sm">
                  <img src="assets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                  <img src="assets/images/logo-dark.png" alt="" height="17">
                </span>
              </a>

              <a href="index.html" class="logo logo-light">
                <span class="logo-sm">
                  <img src="assets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                  <img src="assets/images/logo-light.png" alt="" height="17">
                </span>
              </a>
            </div>

            <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
              id="topnav-hamburger-icon">
              <span class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
              </span>
            </button>
          </div>

          <div class="d-flex align-items-center">
            <div class="dropdown ms-sm-3 header-item topbar-user">
              <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center">
                  <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                    alt="Header Avatar">
                  <span class="text-start ms-xl-2">
                    <span class="d-none d-xl-inline-block ms-1 fw-semibold user-name-text">{{Auth::user()->name}}</span>
                  </span>
                </span>
              </button>
              <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="pages-profile.html"><i
                    class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Profile</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
      <!-- LOGO -->
      <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
          <span class="logo-sm">
            <img src="assets/images/logo-sm.png" alt="" height="22">
          </span>
          <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="17">
          </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
          <span class="logo-sm">
            <img src="assets/images/logo-sm.png" alt="" height="22">
          </span>
          <span class="logo-lg">
            <img src="assets/images/logo-light.png" alt="" height="17">
          </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
          id="vertical-hover">
          <i class="ri-record-circle-line"></i>
        </button>
      </div>

      <div id="scrollbar">
        <div class="container-fluid">

          <div id="two-column-menu">
          </div>
          <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Menu</span></li>
            <li class="nav-item">
              <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="sidebarDashboards">
                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
              </a>
              <div class="collapse menu-dropdown" id="sidebarDashboards">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics"> Analytics </a>
                  </li>
                  <li class="nav-item">
                    <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> CRM </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.html" class="nav-link" data-key="t-ecommerce"> Ecommerce </a>
                  </li>
                  <li class="nav-item">
                    <a href="dashboard-crypto.html" class="nav-link" data-key="t-crypto"> Crypto </a>
                  </li>
                  <li class="nav-item">
                    <a href="dashboard-projects.html" class="nav-link" data-key="t-projects"> Projects </a>
                  </li>
                  <li class="nav-item">
                    <a href="dashboard-nft.html" class="nav-link" data-key="t-nft"> NFT</a>
                  </li>
                  <li class="nav-item">
                    <a href="dashboard-job.html" class="nav-link" data-key="t-job">Job</a>
                  </li>
                </ul>
              </div>
            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
              <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="sidebarApps">
                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Apps</span>
              </a>
              <div class="collapse menu-dropdown" id="sidebarApps">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="apps-calendar.html" class="nav-link" data-key="t-calendar"> Calendar </a>
                  </li>
                  <li class="nav-item">
                    <a href="apps-chat.html" class="nav-link" data-key="t-chat"> Chat </a>
                  </li>
                  <li class="nav-item">
                    <a href="#sidebarEmail" class="nav-link" data-bs-toggle="collapse" role="button"
                      aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                      Email
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarEmail">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="apps-mailbox.html" class="nav-link" data-key="t-mailbox"> Mailbox </a>
                        </li>
                        <li class="nav-item">
                          <a href="#sidebaremailTemplates" class="nav-link" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebaremailTemplates" data-key="t-email-templates">
                            Email Templates
                          </a>
                          <div class="collapse menu-dropdown" id="sidebaremailTemplates">
                            <ul class="nav nav-sm flex-column">
                              <li class="nav-item">
                                <a href="apps-email-basic.html" class="nav-link" data-key="t-basic-action"> Basic
                                  Action </a>
                              </li>
                              <li class="nav-item">
                                <a href="apps-email-ecommerce.html" class="nav-link" data-key="t-ecommerce-action">
                                  Ecommerce Action </a>
                              </li>
                            </ul>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="#sidebarEcommerce" class="nav-link" data-bs-toggle="collapse" role="button"
                      aria-expanded="false" aria-controls="sidebarEcommerce" data-key="t-ecommerce"> Ecommerce
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarEcommerce">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="apps-ecommerce-products.html" class="nav-link" data-key="t-products"> Products
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-ecommerce-product-details.html" class="nav-link"
                            data-key="t-product-Details"> Product Details </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-ecommerce-add-product.html" class="nav-link" data-key="t-create-product">
                            Create Product </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-ecommerce-orders.html" class="nav-link" data-key="t-orders"> Orders </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-ecommerce-order-details.html" class="nav-link" data-key="t-order-details">
                            Order Details </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-ecommerce-customers.html" class="nav-link" data-key="t-customers"> Customers
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-ecommerce-cart.html" class="nav-link" data-key="t-shopping-cart"> Shopping
                            Cart </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-ecommerce-checkout.html" class="nav-link" data-key="t-checkout"> Checkout
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-ecommerce-sellers.html" class="nav-link" data-key="t-sellers"> Sellers </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-ecommerce-seller-details.html" class="nav-link" data-key="t-sellers-details">
                            Seller Details </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="#sidebarProjects" class="nav-link" data-bs-toggle="collapse" role="button"
                      aria-expanded="false" aria-controls="sidebarProjects" data-key="t-projects"> Projects
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarProjects">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="apps-projects-list.html" class="nav-link" data-key="t-list"> List </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-projects-overview.html" class="nav-link" data-key="t-overview"> Overview </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-projects-create.html" class="nav-link" data-key="t-create-project"> Create
                            Project </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="#sidebarTasks" class="nav-link" data-bs-toggle="collapse" role="button"
                      aria-expanded="false" aria-controls="sidebarTasks" data-key="t-tasks"> Tasks
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarTasks">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="apps-tasks-kanban.html" class="nav-link" data-key="t-kanbanboard"> Kanban Board
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-tasks-list-view.html" class="nav-link" data-key="t-list-view"> List View </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-tasks-details.html" class="nav-link" data-key="t-task-details"> Task Details
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="#sidebarCRM" class="nav-link" data-bs-toggle="collapse" role="button"
                      aria-expanded="false" aria-controls="sidebarCRM" data-key="t-crm"> CRM
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCRM">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="apps-crm-contacts.html" class="nav-link" data-key="t-contacts"> Contacts </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-crm-companies.html" class="nav-link" data-key="t-companies"> Companies </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-crm-deals.html" class="nav-link" data-key="t-deals"> Deals </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-crm-leads.html" class="nav-link" data-key="t-leads"> Leads </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="#sidebarCrypto" class="nav-link" data-bs-toggle="collapse" role="button"
                      aria-expanded="false" aria-controls="sidebarCrypto" data-key="t-crypto"> Crypto
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCrypto">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="apps-crypto-transactions.html" class="nav-link" data-key="t-transactions">
                            Transactions </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-crypto-buy-sell.html" class="nav-link" data-key="t-buy-sell"> Buy & Sell
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-crypto-orders.html" class="nav-link" data-key="t-orders"> Orders </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-crypto-wallet.html" class="nav-link" data-key="t-my-wallet"> My Wallet
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-crypto-ico.html" class="nav-link" data-key="t-ico-list"> ICO List </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-crypto-kyc.html" class="nav-link" data-key="t-kyc-application"> KYC
                            Application </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="#sidebarInvoices" class="nav-link" data-bs-toggle="collapse" role="button"
                      aria-expanded="false" aria-controls="sidebarInvoices" data-key="t-invoices"> Invoices
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarInvoices">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="apps-invoices-list.html" class="nav-link" data-key="t-list-view"> List View
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-invoices-details.html" class="nav-link" data-key="t-details"> Details </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-invoices-create.html" class="nav-link" data-key="t-create-invoice"> Create
                            Invoice </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="#sidebarTickets" class="nav-link" data-bs-toggle="collapse" role="button"
                      aria-expanded="false" aria-controls="sidebarTickets" data-key="t-supprt-tickets"> Support
                      Tickets
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarTickets">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="apps-tickets-list.html" class="nav-link" data-key="t-list-view"> List View </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-tickets-details.html" class="nav-link" data-key="t-ticket-details"> Ticket
                            Details </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="#sidebarnft" class="nav-link" data-bs-toggle="collapse" role="button"
                      aria-expanded="false" aria-controls="sidebarnft" data-key="t-nft-marketplace">
                      NFT Marketplace
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarnft">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="apps-nft-marketplace.html" class="nav-link" data-key="t-marketplace">
                            Marketplace </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-nft-explore.html" class="nav-link" data-key="t-explore-now"> Explore Now
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-nft-auction.html" class="nav-link" data-key="t-live-auction"> Live Auction
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-nft-item-details.html" class="nav-link" data-key="t-item-details"> Item
                            Details </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-nft-collections.html" class="nav-link" data-key="t-collections">
                            Collections </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-nft-creators.html" class="nav-link" data-key="t-creators"> Creators </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-nft-ranking.html" class="nav-link" data-key="t-ranking"> Ranking </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-nft-wallet.html" class="nav-link" data-key="t-wallet-connect"> Wallet
                            Connect </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-nft-create.html" class="nav-link" data-key="t-create-nft"> Create NFT </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="apps-file-manager.html" class="nav-link"> <span data-key="t-file-manager">File
                        Manager</span></a>
                  </li>
                  <li class="nav-item">
                    <a href="apps-todo.html" class="nav-link"> <span data-key="t-to-do">To Do</span></a>
                  </li>
                  <li class="nav-item">
                    <a href="#sidebarjobs" class="nav-link" data-bs-toggle="collapse" role="button"
                      aria-expanded="false" aria-controls="sidebarjobs" data-key="t-jobs"> Jobs</a>
                    <div class="collapse menu-dropdown" id="sidebarjobs">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="apps-job-statistics.html" class="nav-link" data-key="t-statistics"> Statistics
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#sidebarJoblists" class="nav-link" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarJoblists" data-key="t-job-lists">
                            Job Lists
                          </a>
                          <div class="collapse menu-dropdown" id="sidebarJoblists">
                            <ul class="nav nav-sm flex-column">
                              <li class="nav-item">
                                <a href="apps-job-lists.html" class="nav-link" data-key="t-list"> List
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="apps-job-grid-lists.html" class="nav-link" data-key="t-grid"> Grid </a>
                              </li>
                              <li class="nav-item">
                                <a href="apps-job-details.html" class="nav-link" data-key="t-overview">
                                  Overview</a>
                              </li>
                            </ul>
                          </div>
                        </li>
                        <li class="nav-item">
                          <a href="#sidebarCandidatelists" class="nav-link" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarCandidatelists" data-key="t-candidate-lists">
                            Candidate Lists
                          </a>
                          <div class="collapse menu-dropdown" id="sidebarCandidatelists">
                            <ul class="nav nav-sm flex-column">
                              <li class="nav-item">
                                <a href="apps-job-candidate-lists.html" class="nav-link" data-key="t-list-view">
                                  List View
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="apps-job-candidate-grid.html" class="nav-link" data-key="t-grid-view">
                                  Grid View</a>
                              </li>
                            </ul>
                          </div>
                        </li>
                        <li class="nav-item">
                          <a href="apps-job-application.html" class="nav-link" data-key="t-application">
                            Application </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-job-new.html" class="nav-link" data-key="t-new-job"> New Job </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-job-companies-lists.html" class="nav-link" data-key="t-companies-list">
                            Companies List </a>
                        </li>
                        <li class="nav-item">
                          <a href="apps-job-categories.html" class="nav-link" data-key="t-job-categories"> Job
                            Categories</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="apps-api-key.html" class="nav-link" data-key="t-api-key">API Key</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="sidebarLayouts">
                <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Layouts</span> <span
                  class="badge badge-pill bg-danger" data-key="t-hot">Hot</span>
              </a>
              <div class="collapse menu-dropdown" id="sidebarLayouts">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="layouts-horizontal.html" target="_blank" class="nav-link"
                      data-key="t-horizontal">Horizontal</a>
                  </li>
                  <li class="nav-item">
                    <a href="layouts-detached.html" target="_blank" class="nav-link"
                      data-key="t-detached">Detached</a>
                  </li>
                  <li class="nav-item">
                    <a href="layouts-two-column.html" target="_blank" class="nav-link" data-key="t-two-column">Two
                      Column</a>
                  </li>
                  <li class="nav-item">
                    <a href="layouts-vertical-hovered.html" target="_blank" class="nav-link"
                      data-key="t-hovered">Hovered</a>
                  </li>
                </ul>
              </div>
            </li> <!-- end Dashboard Menu -->

          </ul>
        </div>
        <!-- Sidebar -->
      </div>

      <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

      <div class="page-content">
        @yield('content')
      </div>
      <!-- End Page-content -->

      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <script>
                document.write(new Date().getFullYear())
              </script> © HummaCertify.
            </div>
            <div class="col-sm-6">
              <div class="text-sm-end d-none d-sm-block">
                Design & Develop by HummaTech
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- end main content-->

  </div>
  <!-- END layout-wrapper -->

  <!--start back-to-top-->
  <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
  </button>
  <!--end back-to-top-->

  </div>

  <!-- JAVASCRIPT -->
  <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
  <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
  <script src="{{ asset('assets/js/plugins.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- apexcharts -->
  <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

  <!-- Vector map-->
  <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
  <script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

  <!--Swiper slider js-->
  <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Dashboard init -->
  <script src="{{ asset('assets/js/pages/dashboard-ecommerce.init.js') }}"></script>

  <!-- App js -->
  <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
@if (session('message'))
  <script>
    Swal.fire({
      icon: "{{ session('message')['icon'] ?? 'success' }}",
      title: "{{ session('message')['title'] ?? 'Oops' }}",
      text: "{{ session('message')['text'] ?? 'Success' }}",
    })
  </script>
@endif

</html>
