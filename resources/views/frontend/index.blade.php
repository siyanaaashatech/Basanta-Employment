@extends('frontend.layouts.master')
{{-- @dd($favicon); --}}



@section('content')
    <!-- Banner -->
    <div class="banner">
        <div class="contain row">
            <div class="box1 col-lg-5 col-md-6 col-sm-12">
                <div class="text-white">
                    <h2><b>WANT TO STUDY ABROAD?</b></h2>
                    <h5><b>Institutions We Represent from</b></h5>
                    <h3><b>Australia, USA, UK, Ireland and Thailand</b></h3>
                    <h3 class="lastword">Next Intake- February2020</b></h3>
                </div>
            </div>
            <div class="box2 col-lg-4 col-md-6 col-sm-12">
                <div class="position-relative">
                    <div class="image1 position-absolute" style="height: 300px; width: 150px;">
                        <img src="image/nico-smit-8Rk1DqL_Lkc-unsplash.jpg" alt="Image 1">
                    </div>
                    <div class="image2 position-absolute" style="height: 300px; width: 150px;">
                        <img src="image/atahan-guc-QcMeSaXPIF0-unsplash.jpg" alt="Image 2">
                    </div>
                    <div class="image3 position-absolute" style="height: 300px; width: 150px;">
                        <img src="image/diogo-nunes-2c08m7lce68-unsplash.jpg" alt="Image 3">
                    </div>
                </div>
            </div>
            <div class="box3 col-lg-3 col-md-6 col-sm-12">
                <div class="position-relative">
                    <div class="image4 position-absolute ">
                        <img src="image/nico-smit-8Rk1DqL_Lkc-unsplash.jpg" style="height: 300px; width: 150px;"
                            alt="Image 4">
                    </div>
                    <div class="image5 position-absolute ">
                        <img src="image/atahan-guc-QcMeSaXPIF0-unsplash.jpg" style="height: 300px; width: 150px;"
                            alt="Image 5">
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- For Services --}}
    <div class="services bg-primary">
        <div class="container ">
            <div class="flexbox d-flex ">
                <div class="flexcard row mx-5">
                    <div class="fleximage col p-0">
                        <img src="/image/card3.avif" class="img-fluid" alt="">
                    </div>
                    <div class="flextext col">
                        <p>How Did van Gogh's Turbulrnt Mind Depict One of the Most Comple</p>
                    </div>
                </div>
                <div class="flexcard row">
                    <div class="fleximage col p-0">
                        <img src="/image/card3.avif" class="img-fluid" alt="">
                    </div>
                    <div class="flextext col">
                        <p>How Did van Gogh's Turbulrnt Mind Depict One of the Most Comple</p>
                    </div>
                </div>
                <div class="flexcard row mx-5">
                    <div class="fleximage col p-0">
                        <img src="/image/card3.avif" class="img-fluid" alt="">
                    </div>
                    <div class="flextext col">
                        <p>How Did van Gogh's Turbulrnt Mind Depict One of the Most Comple</p>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-white text-center">Services Hightlight</h2>
        <div class="container text-center">
            <div class="row justify-content-center text-center">
                <div class="box col-lg-4 col-md-4 col-sm-12">
                    <div class="circle-3 text-white fs-5">
                        <b>
                            <p class="my-2">01</p>
                        </b>
                    </div>
                    <div class="circle-1">
                        <div class="circle-2">
                            <div class="text">
                                <h4> Preparation Classes</h4>
                                <h5>Preparation classes for ILETS & PTE. Free mock up text preparation classes are
                                    conducted every Friday</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box col-lg-4 col-md-4 col-sm-12">
                    <div class="circle-3 text-white fs-5">
                        <b>
                            <p class="my-2">02</p>
                        </b>
                    </div>
                    <div class="circle-1">
                        <div class="circle-2">
                            <div class="text">
                                <h4>Career Counselling</h4>
                                <h5>We provide one-on-one counselling to students who are seeking directions and
                                    applying for studying abroad</h5>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="box col-lg-4 col-md-4 col-sm-12">
                    <div class="circle-3 text-white fs-5">
                        <b>
                            <p class="my-2">03</p>
                        </b>
                    </div>
                    <div class="circle-1">
                        <div class="circle-2 ">
                            <div class="text">
                                <h4>Admission Assistance</h4>
                                <h5>We offer guidance for student application and admition process for the best
                                    college and <br> universities</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center"><button class="btn bg-primary text-white  m-5">View all Services</button></div>
    </div>



       <!-- Slider -->
       <div class="container my-5">
        <div class="slider row">
            <div class="word col-md-6">
                <div class="text">
                    <h2>
                        <p>Your Choice- Your Destination</p>
                    </h2>
                    <p class="text-primary"> Most preferred destinations in the world</p>
                    <p>We represent colleges in Australia,UK, USA, Thailand, India, Switzerland & Japan. However
                        sucessfully
                        enrolling a syudent at the college of his/her choice is not as simple as we made out at the vey
                        outset.
                    </p>
                </div>
                <button class="btn bg-primary text-white ">SEE ALL COUNTRIES</button>
            </div>
            <div class="container-fluid col-md-6 col-sm-12">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="image">
                                <img src="image/slide1.jpg" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="image">
                                <img src="image/slide2.jpg" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="image">
                                <img src="image/slide3.jpg" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="back">
                    <img src="/image/back.png" alt="">
                </div>
            </div>
        </div>
    </div>


      <!-- Enroll -->

      <div class="enroll" row
      style="background-image: url('/image/convo.avif'); background-size: cover; background-position: center;">
      <div class="col-md-5 mx-5">
          <div class="empty">.</div>
          <div class="text mx-5 text-white">
              <h2>A leading university for international students</h2>
              <b> Calling All Artists K-12. Use your creativity to help sustain our world!</b>
              <h5>We are committed to helping international students make the most of their time in Australia by
                  providing quality education, guidance and support.</h5>
          </div>

          <div class="butt d-flex">
              <div class="text-center my-5 mx-3"><button class="btn bg-primary text-white ">Enroll Now</button>
              </div>
              <div class="text-center my-5 mx-1"><button class="btn bg-primary text-white ">Learn More</button>
              </div>
          </div>
      </div>
  </div>
  <!-- Logo -->
  <div class="container ">
      <div class="text-center my-5">
          <h2>Institue we Represent</h2>
          <h5 class="text-primary">We work with some of the best educational institutions around the globe</h5>
      </div>

      <div class="logos row row-cols-lg-4  g-lg-3 ">
          <div class="logo col">
              <div class="image">
                  <img src="image/rmit.png" alt="">
              </div>
          </div>
          <div class="logo col">
              <div class="image">
                  <img src="image/boxhill.png" alt="">
              </div>
          </div>
          <div class="logo col">
              <div class="image">
                  <img src="image/victorian.png" alt="">
              </div>
          </div>
          <div class="logo col">
              <div class="image">
                  <img src="image/western.png" alt="">
              </div>
          </div>
          <div class="logo col">
              <div class="image">
                  <img src="image/australia.png" alt="">
              </div>
          </div>
          <div class="logo col">
              <div class="image">
                  <img src="image/icms.png" alt="">
              </div>
          </div>
          <div class="logo col">
              <div class="image">
                  <img src="image/educo.png" alt="">
              </div>
          </div>
      </div>
      <div class="text-center my-4"><button class="btn bg-primary text-white ">View all Universities</button></div>

  </div>

  <!-- Cources -->
  <div class="container">
      <div class="cources my-5">
          <h2 class="text-center"> Popular courses for students like you</h2>
          <div class="subjects row">
              <div class="subject1 col-md-4 col-sm-6">
                  <div
                      style="background-image: url('image/book.avif'); background-size: cover; background-position: center; height: 200px; ">
                      <div class="text-center "><button class="btn bg-primary text-white">BACHELOR IN
                              ARTS</button>
                      </div>
                  </div>
              </div>
              <div class="subject2 col-md-4 col-sm-6">
                  <div
                      style="background-image: url('image/arts.avif'); background-size: cover; background-position: center; ">
                      <div class="text-center "><button class="btn bg-primary text-white ">BUSINESS
                              MANAGEMENT</button>
                      </div>
                  </div>
              </div>
              <div class="subject3 col-md-4 col-sm-6">
                  <div
                      style="background-image: url('image/maths.avif'); background-size: cover; background-position: center;  ">
                      <div class="text-center "><button class="btn bg-primary text-white ">MATHEMATICS</button>
                      </div>
                  </div>
              </div>
              <div class="subject4 col-md-4 col-sm-6">

                  <div
                      style="background-image: url('image/book.avif'); background-size: cover; background-position: center; ">
                      <div class="text-center "><button class="btn bg-primary text-white ">BACHELOR IN
                              ARTS</button>
                      </div>
                  </div>
              </div>
              <div class="subject5 col-md-4 col-sm-6">

                  <div
                      style="background-image: url('image/arts.avif'); background-size: cover; background-position: center; ">
                      <div class="text-center "><button class="btn bg-primary text-white ">BUSINESS
                              MANAGEMENT</button>
                      </div>
                  </div>
              </div>
              <div class="subject6 col-md-4 col-sm-6">
                  <div
                      style="background-image: url('image/maths.avif'); background-size: cover; background-position: center; ">
                      <div class="text-center "><button class="btn bg-primary text-white ">MATHEMATICS</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Join -->
  <div class="join">
      <div class="text mt-5">
          <h2 class="text-center">Join students over 1000+ like you</h2>
      </div>
      <div class="container">
          <div class="students">
              <div id="carouselExampleDark" class="carousel slide">
                  <div class="carousel-inner">
                      <div class="carousel-item active" data-bs-interval="10000">
                          <div class="image">
                              <img src="/image/female1.avif" class="d-block w-100" alt="">
                          </div>
                          <div class="carousel-caption">
                              <div class="container">
                                  <p class="text-start text-dark">"My journey at the University of Soouth
                                      Australia has been an
                                      exciting and beautiful roller coaster ride.As an international student,your
                                      studies under a whole new system is a real challenge but I received all the
                                      support I needed to begin my studies confidently. The facilitators have
                                      always
                                      been generous-so much that they've frequently made huge photocopies of study
                                      materials to help me with clarification and understanding."</p>
                                  <div class="text-start text-dark">
                                      <h2>SALINA SHRESTHA</h2>
                                      <P>University of South Australia(Master of Social Work)</P>
                                      <button class="bg-primary text-white text-center"> VIEW ALL -</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="carousel-item" data-bs-interval="2000">
                          <div class="image">
                              <img src="/image/female2.avif" class="d-block w-100" alt="...">
                          </div>

                          <div class="carousel-caption d-none d-md-block">
                              <div class="container text-dark">
                                  <p class="text-start">"My journey at the University of Soouth Australia has been
                                      an
                                      exciting and beautiful roller coaster ride.As an international student,your
                                      studies under a whole new system is a real challenge but I received all the
                                      support I needed to begin my studies confidently. The facilitators have
                                      always
                                      been generous-so much that they've frequently made huge photocopies of study
                                      materials to help me with clarification and understanding."</p>
                                  <div class="text-start">
                                      <h2>SALINA SHRESTHA</h2>
                                      <P>University of South Australia(Master of Social Work)</P>
                                      <button class="bg-primary text-white text-center"> VIEW ALL -</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="carousel-item">
                          <div class="image">
                              <img src="/image/female3.avif" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-caption d-none d-md-block">
                              <div class="container text-dark m-3">
                                  <p class="text-start">"My journey at the University of Soouth Australia has been
                                      an
                                      exciting and beautiful roller coaster ride.As an international student,your
                                      studies under a whole new system is a real challenge but I received all the
                                      support I needed to begin my studies confidently. The facilitators have
                                      always
                                      been generous-so much that they've frequently made huge photocopies of study
                                      materials to help me with clarification and understanding."</p>
                                  <div class="text-start">
                                      <h2>SALINA SHRESTHA</h2>
                                      <P>University of South Australia(Master of Social Work)</P>
                                      <button class="bg-primary text-white text-center"> VIEW ALL -</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                      data-bs-slide="prev">
                      <span class="carousel-control-prev-icon bg-primary" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                      data-bs-slide="next">
                      <span class="carousel-control-next-icon bg-primary" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                  </button>
              </div>
          </div>
      </div>
  </div>



@stop
