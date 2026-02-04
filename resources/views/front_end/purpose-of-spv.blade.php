<x-front-layout :menus="$menus" :departments="$departments">
    <style>
    #morex,
    #morex1,
    #morex3,
    #morex6,
    #morex9 {
      display: none ;
    }

    .scrollable {
      overflow: auto ;
    }

    .non-scrollable {
      overflow: hidden ;
    }

    .btn-readmore {
      border: none;
      /* color: red; */
      background: none;
      text-align: right;
      /* right: 0px; */
      font-size: 20px;
      padding: 0;
      margin: 0;
    }

    ::-webkit-scrollbar {
      width: 5px;
    }


    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }


    ::-webkit-scrollbar-thumb {
      background: #888;
    }



    ::-webkit-scrollbar-thumb:hover {
      background: #008b3d;
    }



    #containertfgh {
      /* border: 1px solid red; */
    width: 100%;
    height: 550px;
    position: relative;
      /* background: radial-gradient(ellipse at center, rgba(139, 143, 145, 1) 0%, rgba(111, 113, 113, 1) 47%, rgba(63, 63, 65, 1) 100%); */
    }

    .legendio {
      position: absolute;
      color: #315d2c;
      left: 40vh;
      top: -3vh;
      text-align: center;
      /* border: 1px solid red; */
      width: 40vh;
      font-size: 6vh;
      font-weight: bold;

    }


    .item15 {
      border: solid 25px #92dcab;
      border-radius: 100%;
      position: absolute;
      box-shadow: #000 0 0 15px;
      background-color: white;
      display: flex;
      flex-direction: column;
      text-align: center;
    }

    .item25 {
      border: solid 20px #329152;
      border-radius: 100%;
      position: absolute;
      box-shadow: #000 0 0 15px;
      background-color: white;
      display: flex;
      flex-direction: column;
      text-align: center;
    }

    .item35 {
      border: solid 19px #003e15;
      border-radius: 100%;
      position: absolute;
      box-shadow: #000 0 0 15px;
      background-color: white;
      display: flex;
      flex-direction: column;
      text-align: center;
    }



    .valuehtju {
      display: flex;
      flex-grow: 1.5;
      /* font-family: 'Rubik'; */
      font-weight: bold;
      align-items: flex-end;
      justify-content: center;
    }

    .valuehtju span {
      vertical-align: baseline;
    }

    .valuehtju small {
      font-size: .5em;
      line-height: 1em;
    }

    .titleopls {
      flex-grow: 1;
      align-items: flex-end;
      justify-content: center;
    }

    .titleopls i {
      display: block;
      font-size: 1.4em;
    }

    #first {
      left:0;
      top: 0;
      width: 300px;
      height: 300px;
      z-index: 1;
    }

    #first .valuehtju {
      font-size: 45px;
    }

    #first .titleopls {
      font-size: 30px;
      margin-top: 15px;
    }

    #second {
      left: 213px;
    top: 177px;
      width: 250px;
      height: 250px;
      z-index: 2;
    }

    #second .valuehtju {
      font-size: 35px;
    }

    #second .titleopls {
      margin-top: 15px;
      font-size: 30px;
    }

    #third {
      left: 69px;
    top: 335px;
      width: 230px;
      height: 230px;
      z-index: 3;
    }

    #third .valuehtju {
      font-size: 30px;
    }

    #third .titleopls {
      font-size: 30px;
      margin-top: 15px;
    }
  </style>
    <section class="section banner">
      <div class="bg-banner" style="background-image: url('{{ frontAsset('assets/images/breadcrump.jpg') }}');background-size: cover;">
        <div class="b-title">
          <ul class="b-menu">
            <li class="b-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="b-item"><a href="javascript:void(0)">About Us</a></li>                        
            <li class="b-item"><a class="active">Our History</a></li>
          </ul>
          <h3> Our History </h3>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="his-sec" style="background-image: url({{ frontAsset('assets/images/history.jpg') }});">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-12" style="background-color: #6bca86d4;text-align: center;">
              <h3 class="boldh3">Our History</h3>
            </div>
            <div class="col-lg-6 col-md-12" style="background-color: #53c879fc;height: 650px;overflow-y: hidden;">
              <div class="his-content" style="padding: 12%">
                <h3 class="hist"> Our History</h3>
                <p class="scrollable" id="scrollableText">Odisha Mineral Bearing Areas Development Corporation (OMBADC) is a Public Limited Government Company, not for profit, has been incorporated under Section 8 of the Companies Act, 2013 on 02.12.2014.  <span id="dots3"> ...</span>
                  <span id="morex3"><br>The Company is a Special Purpose Vehicle (SPV) incorporated for undertaking, inter alia, Projects/ works for tribal welfare and area development so as to promote inclusive growth in the mineral bearing areas of the State as per the scheme prepared by the Government of Odisha and approved by the Supreme Court of India in IA No. 2746-48, 2862, 2941, 3629 and 3721 in W.P(c) No.202 of 1995 in its order dated 27th January 2014 and 28th April 2014.</span>
                </p>
                <!-- <h5><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" >Read More..</a></h5> -->
                <button class="btn-readmore" onClick="toggleReadMore3()" id="moreBtn3">Read more ...</button>
                <script>
                  function toggleReadMore3() {
                    var dots = document.getElementById("dots3");
                    var moreText = document.getElementById("morex3");
                    var btnText = document.getElementById("moreBtn3");
                    var scrollableText = document.getElementById("scrollableText");
                    if (dots.style.display === "none") {
                      dots.style.display = "inline";
                      btnText.innerHTML = "Read more...";
                      moreText.style.display = "none";
                      scrollableText.className = "non-scrollable";
                    } else {
                      dots.style.display = "none";
                      btnText.innerHTML = "Read less...";
                      moreText.style.display = "inline";
                      scrollableText.className = "scrollable";
                    }
                  }
                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="purpose-sec">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-12 purpose-left" style="background-color: #92dcab;padding: 50px 123px 50px 10%;height: 650px; overflow-y: hidden;">
              <h3 class="boldh3" >Our Logo</h3>
              <p class="scrollable" id="scrollableText1">The logo, in short, embodies in itself the static images of the organization which is to be conveyed in the most appropriate manner. The logo for OMBADC is developed around the following concepts:<span id="dots1"> ...</span>
                <span id="morex1">1. The green elements represent the intervention areas of the organisation like Afforestation / plantation, agriculture, roads, drinking water and other objects of interest.<br />
2. The shape of three leaves represents green environment and positivity in mineral bearing areas.<br />
3. The symbolic and illustrative elements of community development through infrastructure, plantation, drinking water and education represent the aim and objective of the organisation.<br />
4. Colours chosen in the shades of green-blue-yellow-brown, is to best represent the developmental activities.
                </span>
              </p>
              <button class="btn-readmore" onClick="toggleReadMore2()" id="moreBtn1">Read more ...</button>
              <!-- <h5><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModa3" > Read More. .</a></h5> -->
              <script>
                function toggleReadMore2() {
                  var dots = document.getElementById("dots1");
                  var moreText = document.getElementById("morex1");
                  var btnText = document.getElementById("moreBtn1");
                  var scrollableText = document.getElementById("scrollableText1");

                  if (dots.style.display === "none") {
                    dots.style.display = "inline";
                    btnText.innerHTML = "Read more...";
                    moreText.style.display = "none";
                    scrollableText.className = "non-scrollable";
                  } else {
                    dots.style.display = "none";
                    btnText.innerHTML = "Read less...";
                    moreText.style.display = "inline";
                    scrollableText.className = "scrollable";
                  }
                }
              </script>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="purpose-content">
                <img src="{{ frontAsset('assets/images/our-logo.png') }}" alt="Our History" style="max-height:600px; border:none;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="purpose-sec">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="purpose-content">
                <h3 class="boldh3" >Story Behind its Establishment</h3>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 purpose-left" style="background-color: #92dcab;padding: 100px 10% 50px 126px; height: 650px; overflow-y: scroll;">
              <p class="scrollable" id="scrollableText2">The CEC made a visit to Odisha in March 2014 and advised the State government to furnish a scheme on the Special Purpose Vehicle for their reference and filing before the Hon'ble Supreme Court. In response to the advice of the CEC, the state government vide letter no.                    <span id="dots"> ...</span>
                <span id="morex">
                  10 F (L) 19/2013(pt) dated 29/03/2014 submitted the scheme for filing before the Hon'ble Supreme Court.<br />
                  <br />
                  The scheme proposed by the Govt. of Odisha was accepted by the Hon&rsquo;ble court on 28th April 2014 and its judgement said that &ndash; &ldquo;We have perused the Scheme prepared by the State Government of Odisha and the recommendation of the Central Empowered Committee and we approve the Scheme and direct Ad-hoc CAMPA to transfer to the SPV 50 per cent of the additional amount of the NPV within a month for undertaking tribal welfare development works.&rdquo;   <br />
                  <br />
                  Finally, Odisha Mineral Bearing Areas Development Corporation (OMBADC) was registered as a non-profit Organization under Section-8 of the Companies Act 2013 on 2nd December 2014 and is categorized as Company limited by shares (Public Limited Company) as well as a State government Company.                    
                </span>
              </p>
              <button class="btn-readmore" onClick="toggleReadMore()" id="moreBtn">Read more ...</button>
              <script>
                function toggleReadMore() {
                  var dots = document.getElementById("dots");
                  var moreText = document.getElementById("morex");
                  var btnText = document.getElementById("moreBtn");
                  var scrollableText = document.getElementById("scrollableText2");
                  if (dots.style.display === "none") {
                    dots.style.display = "inline";
                    btnText.innerHTML = "Read more...";
                    moreText.style.display = "none";
                    scrollableText.className = "non-scrollable";
                  } else {
                    dots.style.display = "none";
                    btnText.innerHTML = "Read less...";
                    moreText.style.display = "inline";
                    scrollableText.className = "scrollable";
                  }
                }
              </script>
            </div>
          </div>
        </div>
      </div>
    </section>
</x-front-layout>


