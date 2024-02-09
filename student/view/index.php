
<link rel="stylesheet" href="../assets/index.css">
<script src="../assets/gsap.min.js"></script>
<script src="../assets/jquery-3.5.1.min.js"></script>
<div id="webgl"></div>
<div id="bg-box">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600">
    <path fill="none" d="M0 0v600h800V0zm405.6 458.4C217 458.4 64.1 360.6 64.1 240S217 21.5 405.6 21.5 747.3 119.3 747.3 240s-153 218.4-341.6 218.4z" />
  </svg>
</div>
<div class="svg-box">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600">
    <defs />
    <defs>
      <clipPath id="clip-path">
        <rect id="graph-line-mask" width="90" height="66.7" x="439.5" y="186.6" fill="none" />
      </clipPath>
      <clipPath id="clip-path-2">
        <path id="body-mask" fill="none" d="M490.4 368.3c0 63.7-38 140-84.7 140s-84.8-76.3-84.8-140 38-90.6 84.8-90.6 84.7 26.9 84.7 90.6z" />
      </clipPath>
    </defs>
    <g id="Ship">

      <g id="mid-display">
        <rect width="320.3" height="207" x="248.8" y="116.3" fill="#282e39" stroke="#0ff" stroke-miterlimit="10" stroke-width="5" opacity=".8" rx="18.4" />
        <g id="graph-btm">
          <path id="graph-left" fill="#0ff" d="M439.7 292.1s4.5-19.4 8.7-19c3.6.3 4.6 9.2 7.3 9 3.4-.2 4-14 7.3-14.3 3-.2 4.7 10 8.3 10 4 0 5.1-12.6 8.8-12.8 4.1-.2 7.2 27.1 7.2 27.1z" />
          <path id="graph-morph1" fill="none" d="M439.7 292.1s2.2-10.8 6.5-10.4c3.5.3 8.3-18.9 11-19 3.4-.3 5.6 9 9 8.7 3-.3 3.5-3.2 7-3.2 4 0 5.9 10.6 9.5 10.4 4.2-.2 4.7 13.5 4.7 13.5z" />
          <path id="graph-right" fill="#34496a" d="M502.6 292.1s4.5-19.4 8.8-19c3.5.3 4.6 9.2 7.3 9 3.4-.2 3.9-14 7.3-14.3 3-.2 4.7 10 8.3 10 4 0 5-12.6 8.7-12.8 4.2-.2 7.3 27.1 7.3 27.1z" />
          <path id="graph-morph2" fill="none" d="M502.6 292.1s4.5-9.8 8.8-9.4c3.5.3 4.6-6.8 7.3-7 3.4-.2 3.9 6.6 7.3 6.4 3-.3 4.7-17.9 8.3-17.9 4 0 5 16.5 8.7 16.3 4.2-.2 7.3 11.6 7.3 11.6z" />
        </g>
        <g id="planet">
          <circle id="planet-base" cx="332.2" cy="207.8" r="37.3" fill="#34496a" />
          <ellipse id="planet-circle" cx="331.5" cy="207.8" fill="none" stroke="#0ff" stroke-miterlimit="10" stroke-width="5" rx="61.8" ry="12.7" />
          <path id="planet-top" fill="#34496a" d="M294.9 207.8a37.3 37.3 0 0174.6 0z" />
        </g>
        <g class="graph-circle-lb" id="graph-cir-left">
          <circle cx="290.4" cy="287.5" r="20.8" fill="#34496a" />
          <path fill="#0ff" d="M290.4 287.5l5.3-20.1a20.8 20.8 0 0115.5 20z" />
        </g>
        <g class="graph-circle-lb" id="graph-cir-mid">
          <circle cx="345.4" cy="287.5" r="20.8" fill="#34496a" />
          <path fill="#0ff" d="M345.4 287.5l5.2-20.1a20.8 20.8 0 0115.5 20z" />
        </g>
        <g id="graph-cir">
          <circle cx="396.4" cy="292.1" r="16.4" fill="none" stroke="#34496a" stroke-miterlimit="10" stroke-width="2" />
          <circle cx="396.4" cy="292.1" r="20.8" fill="none" stroke="#34496a" stroke-miterlimit="10" stroke-width="2" />
          <circle cx="396.4" cy="292.1" r="11.6" fill="none" stroke="#34496a" stroke-miterlimit="10" stroke-width="2" />
          <circle id="graph-cir-1" cx="408" cy="292.1" r="2.3" fill="#0ff" />
          <circle id="graph-cir-2" cx="396.4" cy="275.7" r="2.3" fill="#0ff" />
          <circle id="graph-cir-3" cx="417.2" cy="292.1" r="2.3" fill="#0ff" />
          <circle id="graph-cir-mid-2" cx="396.4" cy="292.1" r="2.3" fill="#0ff" data-name="graph-cir-mid" />
        </g>
        <g id="graph-big" clip-path="url(#clip-path)">
          <path id="graph-line" fill="none" stroke="#0ff" stroke-miterlimit="10" stroke-width="5" d="M439.7 206.4c26.3 0 26.3 34.2 52.6 34.2s26.3-34.2 52.6-34.2 26.3 34.2 52.6 34.2 26.3-34.2 52.6-34.2" />
        </g>
        <circle cx="275.7" cy="139.7" r="11.8" fill="#34496a" />
        <circle id="left-top-circle" cx="275.7" cy="139.7" r="11.8" fill="#0ff" />
        <line x1="300.8" x2="387.1" y1="134.3" y2="134.9" fill="none" stroke="#34496a" stroke-linecap="round" stroke-miterlimit="10" stroke-width="5" />
        <line x1="300.8" x2="338.5" y1="143.7" y2="143.9" fill="none" stroke="#34496a" stroke-linecap="round" stroke-miterlimit="10" stroke-width="5" />
        <circle cx="448.1" cy="161.4" r="13.3" fill="none" stroke="#34496a" stroke-miterlimit="10" stroke-width="5" />
        <path class="circles-top" id="circle-l" fill="none" stroke="#0ff" stroke-miterlimit="10" stroke-width="5" d="M448 148.2a13.3 13.3 0 11-13.2 13.3 13.3 13.3 0 0113.3-13.3" />
        <circle cx="491.2" cy="161.4" r="13.3" fill="none" stroke="#34496a" stroke-miterlimit="10" stroke-width="5" />
        <path class="circles-top" id="circle-m" fill="none" stroke="#0ff" stroke-miterlimit="10" stroke-width="5" d="M491.2 148.2a13.3 13.3 0 11-13.3 13.3 13.3 13.3 0 0113.3-13.3" />
        <circle cx="534.4" cy="161.4" r="13.3" fill="none" stroke="#34496a" stroke-miterlimit="10" stroke-width="5" />
        <path class="circles-top" id="circle-r" fill="none" stroke="#0ff" stroke-miterlimit="10" stroke-width="5" d="M534.4 148.2a13.3 13.3 0 11-13.3 13.3 13.3 13.3 0 0113.3-13.3" />
      </g>
      <g id="btm-display">
        <g id="right-display">
          <g id="right-display-display">
            <path fill="#282e39" stroke="#0ff" stroke-miterlimit="10" stroke-width="5" d="M654.7 461H508.6c-10.5 0-15.8-8.5-12-19l26.2-72a29.9 29.9 0 0125.8-18.9h146c10.5 0 15.8 8.5 12 19l-26.2 72a29.9 29.9 0 01-25.7 18.8z" opacity=".8" />
            <g id="bars">
              <polygon id="bar-3-btm" fill="#34496a" points="656.9 441.2 642.4 441.2 667.6 371.7 682.2 371.7 656.9 441.2" />
              <polygon id="bar-3-top" fill="#0ff" points="656.9 441.2 642.4 441.2 653 412 667.5 412 656.9 441.2" />
              <polygon id="bar-2-btm" fill="#34496a" points="633.7 441.2 619.2 441.2 644.5 371.7 659 371.7 633.7 441.2" />
              <polygon id="bar-2-top" fill="#0ff" points="633.7 441.2 619.2 441.2 636 395.1 650.5 395.1 633.7 441.2" />
              <polygon id="bar-1-btm" fill="#34496a" points="610.6 441.2 596.1 441.2 621.4 371.7 635.9 371.7 610.6 441.2" />
              <polygon id="bar-1-top" fill="#0ff" points="610.6 441.2 596.1 441.2 604 419.5 618.5 419.5 610.6 441.2" />
            </g>
            <g id="btns" fill="#0ff">
              <ellipse cx="546.8" cy="379.3" rx="6.5" ry="4.6" transform="rotate(-39.8 546.8 379.3)" />
              <ellipse cx="562.7" cy="379.3" rx="6.5" ry="4.6" transform="rotate(-39.8 562.7 379.3)" />
              <ellipse cx="578.6" cy="379.3" rx="6.5" ry="4.6" transform="rotate(-39.8 578.6 379.3)" />
              <ellipse cx="594.5" cy="379.3" rx="6.5" ry="4.6" transform="rotate(-39.8 594.5 379.3)" />
              <ellipse cx="540.6" cy="396.3" rx="6.5" ry="4.6" transform="rotate(-39.8 540.6 396.3)" />
              <ellipse cx="556.5" cy="396.3" rx="6.5" ry="4.6" transform="rotate(-39.8 556.5 396.3)" />
              <ellipse cx="572.4" cy="396.3" rx="6.5" ry="4.6" transform="rotate(-39.8 572.4 396.3)" />
              <ellipse cx="588.3" cy="396.3" rx="6.5" ry="4.6" transform="rotate(-39.8 588.4 396.3)" />
              <ellipse cx="534.4" cy="413.3" rx="6.5" ry="4.6" transform="rotate(-39.8 534.4 413.3)" />
              <ellipse cx="550.3" cy="413.3" rx="6.5" ry="4.6" transform="rotate(-39.8 550.3 413.3)" />
              <ellipse cx="566.2" cy="413.3" rx="6.5" ry="4.6" transform="rotate(-39.8 566.2 413.3)" />
              <ellipse cx="582.1" cy="413.3" rx="6.5" ry="4.6" transform="rotate(-39.8 582.2 413.3)" />
              <ellipse cx="528.2" cy="430.3" rx="6.5" ry="4.6" transform="rotate(-39.8 528.2 430.3)" />
              <ellipse cx="544.1" cy="430.3" rx="6.5" ry="4.6" transform="rotate(-39.8 544.1 430.3)" />
              <ellipse cx="560" cy="430.3" rx="6.5" ry="4.6" transform="rotate(-39.6 562.3 429.7)" />
              <ellipse cx="575.9" cy="430.3" rx="6.5" ry="4.6" transform="rotate(-39.8 576 430.3)" />
            </g>
          </g>
          <ellipse id="right-display-shadow" cx="593.3" cy="508.4" fill="#1e3855" rx="74" ry="10.9" />
        </g>
        <g id="left-display">
          <g id="left-display-display">
            <path fill="#282e39" stroke="#0ff" stroke-miterlimit="10" stroke-width="5" d="M299 461H153c-10.4 0-22-8.5-25.8-19L101 370c-3.8-10.4 1.6-18.9 12-18.9h146c10.5 0 22 8.5 25.9 18.9l26.2 72c3.8 10.4-1.6 19-12 19z" opacity=".8" />
            <polygon fill="#0ff" points="153.1 433.3 155.7 440.3 158.2 447.3 153.6 443.8 148.9 440.3 151 436.8 153.1 433.3" />
            <polygon fill="#0ff" points="143 433.3 146.4 433.3 151.9 448.4 148.5 448.4 143 433.3" />
            <polygon fill="#0ff" points="193.8 448.4 191.3 441.4 188.7 434.4 193.4 437.9 198 441.4 195.9 444.9 193.8 448.4" />
            <polygon fill="#0ff" points="203.9 448.4 200.6 448.4 195.1 433.3 198.4 433.3 203.9 448.4" />
            <polygon fill="#0ff" points="164.4 433.3 167.8 433.3 173.3 448.4 169.9 448.4 164.4 433.3" />
            <polygon fill="#0ff" points="174 433.3 177.4 433.3 182.9 448.4 179.5 448.4 174 433.3" />
            <ellipse cx="199" cy="377.7" fill="#34496a" rx="5.4" ry="7.7" transform="rotate(-50.2 199 377.7)" />
            <polygon fill="#0ff" points="198.2 380.9 197 377.7 195.9 374.6 199.2 376.1 202.6 377.7 200.4 379.3 198.2 380.9" />
            <line x1="217.3" x2="267.5" y1="377.7" y2="377.7" fill="#282e39" stroke="#0ff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="5" opacity=".8" />
            <ellipse cx="206.2" cy="397.6" fill="#34496a" rx="5.4" ry="7.7" transform="rotate(-50.2 206.2 397.6)" />
            <polygon fill="#0ff" points="205.4 400.7 204.2 397.6 203.1 394.4 206.4 396 209.8 397.6 207.6 399.2 205.4 400.7" />
            <line x1="224.5" x2="274.8" y1="397.6" y2="397.6" fill="#282e39" stroke="#0ff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="5" opacity=".8" />
            <ellipse cx="213.5" cy="417.5" fill="#34496a" rx="5.4" ry="7.7" transform="rotate(-50.2 213.4 417.4)" />
            <polygon fill="#0ff" points="212.6 420.6 211.5 417.5 210.3 414.3 213.7 415.9 217 417.5 214.8 419 212.6 420.6" />
            <line x1="231.8" x2="282" y1="417.5" y2="417.5" fill="#282e39" stroke="#0ff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="5" opacity=".8" />
            <ellipse cx="220.7" cy="437.3" fill="#34496a" rx="5.4" ry="7.7" transform="rotate(-50.2 220.7 437.3)" />
            <polygon fill="#0ff" points="219.8 440.5 218.7 437.3 217.6 434.2 220.9 435.8 224.3 437.3 222.1 438.9 219.8 440.5" />
            <line x1="239" x2="289.2" y1="437.3" y2="437.3" fill="#282e39" stroke="#0ff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="5" opacity=".8" />
            <path fill="#34496a" d="M190.5 424.4h-46a7.4 7.4 0 01-6.5-4.7l-15.8-43.5c-1-2.6.4-4.7 3-4.7h46a7.4 7.4 0 016.5 4.7l15.8 43.5c1 2.6-.4 4.7-3 4.7z" />
            <ellipse cx="157.8" cy="398" fill="#282e39" rx="17.5" ry="25.1" transform="rotate(-50.2 157.8 398)" />
            <ellipse cx="157.8" cy="398" fill="#282e39" rx="5.1" ry="7.3" transform="rotate(-50.2 157.8 398)" />
            <path fill="#0ff" d="M159.8 405a10 10 0 01-8.8-6.4 5.8 5.8 0 01.5-5.4 5.3 5.3 0 014.4-2.2 10 10 0 018.8 6.4 5.8 5.8 0 01-.5 5.4 5.3 5.3 0 01-4.4 2.1zm-3.9-10.6a2 2 0 00-1.6.7 2.5 2.5 0 000 2.3 6.6 6.6 0 005.4 4 2 2 0 001.7-.6 2.5 2.5 0 000-2.3 6.6 6.6 0 00-5.5-4zM173.6 405h14.5l-5.1-14h-14.4a1.8 1.8 0 00-1.7 2.6l3.2 8.7a4.1 4.1 0 003.5 2.6z" />
          </g>
          <ellipse id="left-display-shadow" cx="224.5" cy="511.5" fill="#1e3855" rx="74" ry="10.9" />
        </g>
      </g>
      <g id="robot">
        <path id="body-base" fill="#fff" d="M490.4 368.3c0 63.7-38 140-84.7 140s-84.8-76.3-84.8-140 38-90.6 84.8-90.6 84.7 26.9 84.7 90.6z" />
        <g id="robot-body">
          <ellipse id="robot-shadow" cx="405.6" cy="543.9" fill="#1e3855" rx="44.5" ry="7.1" />
          <g clip-path="url(#clip-path-2)">
            <g id="faces">
              <g id="face">
                <ellipse id="face-back" cx="560" cy="340.9" fill="#34496a" rx="61.5" ry="32.2" />
                <g class="eyes" id="eyes" fill="#0ff">
                  <ellipse cx="539.8" cy="340.9" rx="7.3" ry="13.7" />
                  <ellipse cx="579.1" cy="340.9" rx="7.3" ry="13.7" />
                </g>
              </g>
              <g id="face-2" data-name="face">
                <ellipse id="face-back-2" cx="256.9" cy="340.9" fill="#34496a" data-name="face-back" rx="61.5" ry="32.2" />
                <g class="eyes" id="eyes-2" fill="#0ff" data-name="eyes">
                  <ellipse cx="236.7" cy="340.9" rx="7.3" ry="13.7" />
                  <ellipse cx="275.9" cy="340.9" rx="7.3" ry="13.7" />
                </g>
              </g>
              <g id="charge">
                <circle cx="406.8" cy="340.9" r="16.2" fill="#34496a" />
                <rect width="4.1" height="13.9" x="398.7" y="334" fill="#fff" />
                <rect width="4.1" height="13.9" x="410.8" y="334" fill="#fff" />
              </g>
            </g>
          </g>
        </g>
        <path id="right-hand" fill="#fff" d="M549.7 400.7c0 15.6-31.2 28.2-56.2 28.2s-34.2-12.6-34.2-28.2 9.2-28 34.2-28 56.2 12.5 56.2 28z" />
        <path id="left-hand" fill="#fff" d="M255.6 400.7c0-15.5 31.2-28 56.2-28s34.2 12.5 34.2 28-9.3 28.2-34.2 28.2-56.2-12.6-56.2-28.2z" />
      </g>
      <path id="note-1" fill="none" d="M180 317l-3.5-3.8a1 1 0 00-1.7.7v8.1a6 6 0 00-2-.3c-2.5 0-4.6 1.6-4.6 3.5s2 3.5 4.7 3.5 4.6-1.5 4.6-3.5a3 3 0 00-.7-1.9v-6.8l1.7 1.8a1 1 0 101.5-1.4z" />
      <path id="note-2" fill="none" d="M203.4 323.4v-9.5a1 1 0 00-1-1h-9.3a1 1 0 00-1 1v8.1a6 6 0 00-2-.3c-2.5 0-4.6 1.6-4.6 3.5s2 3.5 4.7 3.5 4.6-1.5 4.6-3.5a2.9 2.9 0 00-.7-1.9V315h7.3v7.1a5.8 5.8 0 00-1.9-.3c-2.6 0-4.7 1.6-4.7 3.5s2.1 3.5 4.7 3.5 4.7-1.5 4.7-3.5a2.9 2.9 0 00-.8-1.8z" />
    </g>
  </svg>
</div>
<canvas class="webgl2"></canvas>
<script>
    /* SVG ANIMATION */

function animation() {
  let isLeft = false;

  /**
   * Robot
   */

  gsap.set("#left-hand", {
    x: 30,
    transformOrigin: "right center"
  });
  gsap.set("#right-hand", {
    x: -30,
    transformOrigin: "left center"
  });

  const eyesTl = gsap
    .timeline({
      repeat: -1,
      repeatDelay: 1
    })
    .to(".eyes", {
      opacity: 0,
      duration: 0.1
    })
    .to(".eyes", {
      opacity: 1,
      duration: 0.1
    });

  const robotTl = gsap
    .timeline({
      repeat: -1
    })
    .to(
      "#robot",
      {
        x: 100,
        onStart: () => {
          isLeft = false;
        }
      },
      "right"
    )
    .to(
      "#faces",
      {
        x: -60
      },
      "right"
    )
    .to(
      "#left-hand",
      {
        x: 80
      },
      "right"
    )
    .to(
      "#charge",
      {
        scaleX: 0.8
      },
      "right"
    )
    .to("#right-hand", {
      rotation: 20,
      repeat: 2,
      yoyo: true,
      ease: "power2.inOut",
      duration: 0.4
    })
    .to(
      "#robot",
      {
        x: -100,
        onStart: () => {
          isLeft = true;
        }
      },
      "left"
    )
    .to(
      "#faces",
      {
        x: 60
      },
      "left"
    )
    .to(
      "#charge",
      {
        scaleX: 0.8
      },
      "left"
    )
    .to(
      "#left-hand",
      {
        x: 30
      },
      "left"
    )
    .to(
      "#right-hand",
      {
        x: -80
      },
      "left"
    )
    .to("#left-hand", {
      rotation: -20,
      repeat: 3,
      yoyo: true,
      ease: "power1.inOut",
      duration: 0.4
    })
    .to(
      "#robot",
      {
        x: 0
      },
      "center"
    )
    .to(
      "#faces",
      {
        x: 0
      },
      "center"
    )
    .to(
      "#charge",
      {
        scaleX: 1
      },
      "center"
    )
    .to("#left-hand", {
      y: -50,
      x: -10,
      rotation: 30
    })
    .to("#left-hand", {
      rotation: 50,
      repeat: 1,
      yoyo: true,
      ease: "sine.inOut"
    })
    .to("#left-hand", {
      y: 0,
      x: 30,
      rotation: 0
    });
  robotTl.timeScale(0.8);

  /**
   * Main display
   */

  //left-top-circle
  gsap.set("#left-top-circle", {
    transformOrigin: "center",
    scale: 0
  });

  gsap.to("#left-top-circle", {
    transformOrigin: "center",
    scale: 1,
    fill: "#34496a",
    repeat: -1,
    duration: 2
  });

  //graph-left-btm
  gsap.to(".graph-circle-lb", {
    rotation: 360,
    transformOrigin: "center",
    duration: 2,
    stagger: {
      amount: 1,
      ease: "sine.inOut",
      repeat: -1
    }
  });

  //planet
  const planetTl = gsap
    .timeline({
      repeat: -1,
      yoyo: true
    })
    .set("#planet-circle", {
      rotation: 10,
      transformOrigin: "center"
    })
    .to("#planet-circle", {
      rotation: -10,
      transformOrigin: "center",
      ease: "power1.inOut"
    });

  //circle-btm-graph
  gsap.to("#graph-cir-1", {
    rotation: 360,
    ease: "none",
    transformOrigin: "-9px center",
    duration: 3,
    repeat: -1
  });

  gsap.to("#graph-cir-2", {
    rotation: 360,
    ease: "none",
    transformOrigin: "center 18px",
    duration: 4,
    repeat: -1
  });

  gsap.to("#graph-cir-3", {
    rotation: 360,
    ease: "none",
    transformOrigin: "-19px center",
    duration: 5,
    repeat: -1
  });

  gsap.to("#graph-cir-mid-2", {
    scale: 1.5,
    ease: "sine.inOut",
    transformOrigin: "center",
    repeat: -1,
    yoyo: true
  });

  //bottom-right-graph
  gsap.to("#graph-left", {
    morphSVG: "#graph-morph1",
    repeat: -1,
    yoyo: true,
    ease: Elastic.easeOut.config(1, 0.8),
    duration: 2
  });

  gsap.to("#graph-right", {
    morphSVG: "#graph-morph2",
    repeat: -1,
    yoyo: true,
    ease: "power3.inOut",
    duration: 1
  });
  //top right circle

  gsap.to(".circles-top", {
    rotation: 360,

    duration: 10,
    transformOrigin: "center",
    stagger: {
      each: 0.5,
      ease: "none",
      repeat: -1
    }
  });

  gsap.to("#circle-l", {
    drawSVG: "20",
    repeat: -1,
    yoyo: true,
    ease: Bounce.easeOut,
    duration: 1
  });

  gsap.to("#circle-m", {
    drawSVG: "80 30",
    repeat: -1,
    yoyo: true,
    ease: Bounce.easeOut,
    duration: 1.5
  });

  gsap.to("#circle-r", {
    drawSVG: "0",
    repeat: -1,
    yoyo: true,
    ease: SteppedEase.config(12),
    duration: 3
  });

  /**
   * Left Display
   */
  gsap.to("#left-display-display", {
    y: 10,
    ease: "sine.inOut",
    repeat: -1,
    yoyo: true,
    duration: 2
  });
  gsap.to("#left-display-shadow", {
    scale: 1.1,
    transformOrigin: "center",
    ease: "sine.inOut",
    repeat: -1,
    yoyo: true,
    duration: 2
  });

  //song
  const songTl = gsap
    .timeline({
      repeat: -1
    })
    .to("#left-display-display line", {
      stroke: "#34496a",
      stagger: {
        each: 0.5
      }
    })
    .to("#left-display-display line", {
      stroke: "#0ff",
      stagger: {
        each: 0.5
      }
    });

  for (let i = 0; i < 3; i++) {
    let clone1 = document.querySelector("#note-1").cloneNode(true);
    let clone2 = document.querySelector("#note-2").cloneNode(true);
    clone1.classList.add("notes");
    clone2.classList.add("notes");
    gsap.set(clone1, {
      attr: {
        d:
          "M180 317l-3.5-3.8a1 1 0 00-1.7.7v8.1a6 6 0 00-2-.3c-2.5 0-4.6 1.6-4.6 3.5s2 3.5 4.7 3.5 4.6-1.5 4.6-3.5a3 3 0 00-.7-1.9v-6.8l1.7 1.8a1 1 0 101.5-1.4z",
        fill: "#0ff"
      },
      y: 40,
      opacity: 0
    });
    gsap.set(clone2, {
      attr: {
        d:
          "M203.4 323.4v-9.5a1 1 0 00-1-1h-9.3a1 1 0 00-1 1v8.1a6 6 0 00-2-.3c-2.5 0-4.6 1.6-4.6 3.5s2 3.5 4.7 3.5 4.6-1.5 4.6-3.5a2.9 2.9 0 00-.7-1.9V315h7.3v7.1a5.8 5.8 0 00-1.9-.3c-2.6 0-4.7 1.6-4.7 3.5s2.1 3.5 4.7 3.5 4.7-1.5 4.7-3.5a2.9 2.9 0 00-.8-1.8z",
        fill: "#0ff"
      },
      x: -10,
      y: 40,
      opacity: 0
    });
    document.querySelector("svg").appendChild(clone1);
    document.querySelector("svg").appendChild(clone2);
  }

  gsap.to(".notes", {
    y: gsap.utils.random(-50, -100, 10, true),
    x: gsap.utils.random(-50, 50, 25, true),
    opacity: 1,
    duration: gsap.utils.random(1.5, 3, 1.5, true),
    stagger: {
      each: 0.5,
      ease: "sine.in",
      repeat: -1
    }
  });

  /**
   * Right Display
   */
  gsap.to("#right-display-display", {
    y: 10,
    ease: "sine.inOut",
    repeat: -1,
    yoyo: true,
    duration: 2,
    delay: 1.5
  });
  gsap.to("#right-display-shadow", {
    scale: 1.1,
    transformOrigin: "center",
    ease: "sine.inOut",
    repeat: -1,
    yoyo: true,
    duration: 2,
    delay: 1.5
  });

  //graph-lines
  gsap.to("#graph-line", {
    x: -105,
    ease: "none",
    repeat: -1,
    duration: 2
  });

  gsap.to("#bar-1-top", {
    morphSVG: "#bar-1-btm",
    repeat: -1,
    yoyo: true
  });
  gsap.to("#bar-2-top", {
    morphSVG: "#bar-2-btm",
    repeat: -1,
    yoyo: true,
    duration: 1.5
  });
  gsap.to("#bar-3-top", {
    morphSVG: "#bar-3-btm",
    repeat: -1,
    yoyo: true,
    duration: 2
  });

  //btns
  gsap.to("#btns ellipse", {
    fill: "#34496a",
    stagger: {
      amount: 1,
      grid: [4, 4],
      repeat: -1,
      yoyo: true,
      from: "random"
    }
  });

  const sizes = {
    width: window.innerWidth,
    height: window.innerHeight
  };

  /**
   * Mouse
   */

  let mouseX = 0;
  let mouseY = 0;

  window.addEventListener("mousemove", (e) => {
    mouseX = (e.clientX / sizes.width) * 2 - 1;
    mouseY = -(e.clientY / sizes.height) * 2 + 1;

    gsap.to("#mid-display", {
      x: -mouseX * 10,
      y: mouseY * 10
    });

    gsap.to("#btm-display", {
      x: -mouseX * 20,
      y: mouseY * 10
    });
  });

  document.getElementById("robot").addEventListener("click", () => {
    robotTl.pause();

    const helloTl = gsap
      .timeline({
        paused: true
      })
      .to("#faces", {
        x: isLeft ? 150 : -150,
        ease: "sine.inOut",
        repeatDelay: 1,
        repeat: 1,
        yoyo: true,

        onComplete: () => {
          robotTl.resume();
        }
      });

    helloTl.restart();
  });
}
animation();

/* stars */
//reference https://redstapler.co/space-warp-background-effect-three-js/
let scene, camera, renderer, stars, startGeometry;
const count = 5000;

function init() {
  scene = new THREE.Scene();

  startGeometry = new THREE.BufferGeometry();

  const positions = new Float32Array(count * 3);
  for (let i = 0; i < count; i++) {
    positions[i] = Math.random() * 600 - 300;
  }
  startGeometry.setAttribute(
    "position",
    new THREE.BufferAttribute(positions, 3)
  );

  let sprite = new THREE.TextureLoader().load(
    "https://i.postimg.cc/T25jx3S9/circle-05.png"
  );
  let starMaterial = new THREE.PointsMaterial({
    size: 2,
    sizeAttenuation: true,
    transparent: true,
    alphaMap: sprite
  });

  stars = new THREE.Points(startGeometry, starMaterial);
  scene.add(stars);

  /**
   * camera1
   */
  camera = new THREE.PerspectiveCamera(
    60,
    window.innerWidth / window.innerHeight,
    1,
    1000
  );
  camera.position.z = 1;
  camera.rotation.x = Math.PI / 2;

  window.addEventListener("resize", () => {
    camera.aspect = 800 / 600;
    camera.updateProjectionMatrix();
    renderer.setSize(800, 600);
  });

  renderer = new THREE.WebGLRenderer();
  renderer.setSize(800, 600);
  renderer.setClearColor("#282e39", 0.5);
  document.getElementById("webgl").appendChild(renderer.domElement);

  /**
   * Animate
   */

  function animate() {
    for (let i = 0; i < count; i++) {
      const i3 = i * 3;

      startGeometry.attributes.position.array[i3 + 1] -= 3;

      if (startGeometry.attributes.position.array[i3 + 1] < -100) {
        startGeometry.attributes.position.array[i3 + 1] = 300;
      }
    }
    startGeometry.attributes.position.needsUpdate = true;
    stars.rotation.y += 0.002;

    renderer.render(scene, camera);
    requestAnimationFrame(animate);
  }
  animate();
}

init();

/* OBJECTS */

function objects() {
  // Canvas
  const canvas = document.querySelector("canvas.webgl2");

  // scene2
  const scene2 = new THREE.Scene();

  /**
   * Objects
   */
  const objects = [];
  const objectGeometry = new THREE.IcosahedronGeometry(1, 0);
  const objectMaterial = new THREE.MeshStandardMaterial({
    color: 0x6699ff,
    metalness: 0,
    roughness: 0
  });
  for (let i = 0; i < 3; i++) {
    const object = new THREE.Mesh(objectGeometry, objectMaterial);
    object.scale.set(0.4, 0.4, 0.4);
    scene2.add(object);
    objects.push(object);
  }
  objects[0].position.set(3, 0.5, 0);
  objects[1].position.set(-3.5, 2, 0);
  objects[2].position.set(1, 3, 0);

  objects.forEach((object) => {
    gsap
      .to(object.rotation, {
        x: Math.PI * 2,
        z: Math.PI * 2,
        repeat: -1,
        ease: "none",
        duration: 8 + Math.random() * 5,
        delay: Math.random() * 50
      })
      .seek(100);

    gsap
      .to(object.position, {
        y: 1.5,
        z: -1,
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut",
        duration: 4 + Math.random() * 5
      })
      .seek(100);
  });

  /**
   * Lights
   */
  const light = new THREE.AmbientLight(0xffffff, 1.0);
  scene2.add(light);

  const directionalLight = new THREE.DirectionalLight(0xff0000, 0.8);
  directionalLight.position.set(5, 10, 0);
  scene2.add(directionalLight);

  const directionalLight2 = new THREE.DirectionalLight(0xff000, 0.7);
  directionalLight2.position.set(-5, -5, 2);
  scene2.add(directionalLight2);

  /**
   * Sizes
   */
  const sizes = {
    width: window.innerWidth,
    height: window.innerHeight
  };

  window.addEventListener("resize", () => {
    // Update sizes
    sizes.width = window.innerWidth;
    sizes.height = window.innerHeight;

    // Update camera2
    camera2.aspect = sizes.width / sizes.height;
    camera2.updateProjectionMatrix();

    // Update renderer2
    renderer2.setSize(sizes.width, sizes.height);
    renderer2.setPixelRatio(Math.min(window.devicePixelRatio, 2));
  });

  /**
   * camera2
   */
  // Base camera2
  const camera2 = new THREE.PerspectiveCamera(
    75,
    sizes.width / sizes.height,
    0.1,
    100
  );
  camera2.position.z = 5;
  scene2.add(camera2);

  /**
   * renderer2
   */
  const renderer2 = new THREE.WebGLRenderer({
    canvas: canvas,
    alpha: true
  });
  renderer2.setSize(sizes.width, sizes.height);
  renderer2.setPixelRatio(Math.min(window.devicePixelRatio, 2));
  renderer2.setClearColor(0xffffff, 0);

  /**
   * Animate
   */
  const clock = new THREE.Clock();

  let currentIntersect = null;

  const tick = () => {
    const elapsedTime = clock.getElapsedTime();

    // Render
    renderer2.render(scene2, camera2);

    window.requestAnimationFrame(tick);
  };

  tick();
}
objects();

</script>