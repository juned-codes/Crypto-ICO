

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Satoshicat - Token Presale</title>
  <link rel="stylesheet" href="style.css" />
  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js"></script>
  <script src="js/connection.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Animate.css for animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/web3@1.10.0/dist/web3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/ethers@5.7.2/dist/ethers.min.js"></script>

</head>
<body>


<!-- HEADER -->
<header class="main-header">
    <div class="container nav">
        <div class="logo">SATOSHI CAT</div>
        <button class="hamburger" aria-label="Toggle navigation">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </button>
        <ul class="nav-links">
            <li><a href="#about"><i class="fas fa-info-circle"></i> About</a></li>
            <li><a href="#roadmap"><i class="fas fa-map-signs"></i> Roadmap</a></li>
            <li><a href="#token"><i class="fas fa-coins"></i> Token</a></li>
            <li><a href="#team"><i class="fas fa-users"></i> Team</a></li>
            <li><a href="#faq"><i class="fas fa-question-circle"></i> FAQ</a></li>
            <li><a href="#blog"><i class="fas fa-blog"></i> Blog</a></li>
            <li><a href="#contact"><i class="fas fa-envelope"></i> Contact</a></li>
        </ul>
    </div>
</header>



<!-- HERO SECTION -->
<section class="hero-section">
  <div class="container hero-content">
    <div class="left">
    <img src="yellhold.png" alt="About" style="max-width: 100%; height: 50%; width: 300px;">
      <h1>Welcome to <span>SatoshiCat</span></h1>
      <p>Next-gen Gaming blockchain $SCAT Token for early Investors.</p>
      <a href="#buy" class="btn">Buy Token Now</a>
    <a class="btn" id="calculateBtn"><i class="fas fa-info-circle"></i>How to Buy?</a>

   <br><br>
  
  <div class="exchange-box-wrapper">
    <h2 class="exchange-title">Centralized Exchange Listing <span>(Q2 April)</span></h2>
    <div class="exchange-circle-container">
      <div class="circle-item">
        <div class="circle"><img src="images/mexc.png" alt="MEXC" /></div>
        <p class="circle-name">MEXC</p>
      </div>
      <div class="circle-item">
        <div class="circle"><img src="images/kucoin.png" alt="KuCoin" /></div>
        <p class="circle-name">KuCoin</p>
      </div>
      <div class="circle-item">
        <div class="circle"><img src="images/gate.png" alt="Gate.io" /></div>
        <p class="circle-name">Gate.io</p>
      </div>
      <div class="circle-item">
        <div class="circle"><img src="images/bing.png" alt="BingX" /></div>
        <p class="circle-name">BingX</p>
      </div>
    </div>
  </div>
 

    </div>
    <div class="right presale-box">
    <img src="bnbtoken.png" alt="Presale" class="presale-top-img">
    <!-- Flashing animated text -->

    <p class="flashing-text">$SCAT in BNB Chain</p>

<div class="countdown-timer" id="countdown">
    <div class="time-box">
        <span id="days">00</span>
        <small>Days</small>
    </div>
    <div class="time-box">
        <span id="hours">00</span>
        <small>Hours</small>
    </div>
    <div class="time-box">
        <span id="minutes">00</span>
        <small>Minutes</small>
    </div>
    <div class="time-box">
        <span id="seconds">00</span>
        <small>Seconds</small>
    </div>
</div>

     <h3>ICO Presale is Live</h3>
<p><strong>1 $SCAT = 0.00001 BNB</strong></p>
<div class="progress-bar"><div class="progress" style="width: 75%"></div></div>
<p><strong>75% Sold</strong></p>


<div class="presale-wrapper">
  <div class="presale-details-box">
    <h4 class="section-heading">You deposit</h4>

    <div class="token-options">
      <div class="token-option" id="bnbOption" onclick="selectToken('bnbOption')">
        <img src="bnbtoken.png" alt="BNB" />
        <span>BNB</span>
      </div>
    </div>

<p id="balanceInfo" class="balance-info" style="display:none;">
            Current balance: <strong id="bnbBalance">0.00000000</strong> BNB
          </p>



    <input type="text" class="amount-input" placeholder="Enter BNB amount" oninput="calculateSCAT()" id="bnbInput" />
    

    <div class="arrow">⬇</div>

    <h4 class="section-heading">You will receive</h4>
    <p class="receive-amount"><span id="scatAmount">0</span> <strong>$SCAT</strong></p>
    <p class="wlfi-balance">Your $SCAT Balance: <strong>0</strong> $SCAT</p>

    <div class="wallet-buttons">
      <button id="connectBtn" class="btn yellow-btn">Connect Wallet</button>
    </div>
    <p id="walletAddress" class="wallet-address" style="display:none;"></p>


    </div>
  </div>
</section>

<!-- Add this modal HTML before closing </body> -->
<div id="buyModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2 style="text-color:black;">Send BNB to This Address ⏳<span id="timer">30:00</span></h2>
    </div>
    <div class="modal-body">
      <div class="address-box">
        <input type="text" id="bscAddress" value="0x1234...abcd" readonly>
        <button onclick="copyAddress()" class="copy-btn">
          <i class="fas fa-copy"></i> Copy
        </button>
      </div>
      <div class="instructions">
        <h3><i class="fas fa-info-circle"></i> Instructions</h3>
        <ol>
          <li>Send <strong>Minimum 0.002 BNB</strong> to the address above</li>
          <li>Use BEP20 (BSC) Network only</li>
          <li>Do NOT send from exchanges (except Binance)</li>
        </ol>
        <div class="binance-guide">
          <h4><i class="fas fa-exchange-alt"></i> How to withdraw from Binance:</h4>
          <p>1. Go to Binance App > Withdraw<br>
             2. Select BNB > BSC Network<br>
             3. Paste address above & confirm</p>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <p>⏰ Order valid for: <span id="timer2">30:00</span></p>
    </div>
  </div>
</div>

<!-- About Section -->
<section id="about" class="section">
  <div class="container">
    <h2>About Our ICO</h2>
    <p>Lorem ipsum dolor sit amet consectetur. Blockchain-based ecosystem to invest and grow with decentralized power.</p>
    <img src="yellcat.png" alt="About" style="max-width: 100%; height: 50%; width: 300px;">
  </div>
</section>

<!-- Roadmap -->
<section class="section" id="roadmap">
  <h2>Our Roadmap</h2>
  <div class="roadmap-container">
    <div class="roadmap-card" style="--delay: 0s">
      <h3>Q1 2024</h3>
      <p>Project idea & team formation</p>
    </div>
    <div class="roadmap-card" style="--delay: 0.2s">
      <h3>Q2 2024</h3>
      <p>Website Launch & Token Development</p>
    </div>
    <div class="roadmap-card" style="--delay: 0.4s">
      <h3>Q3 2024</h3>
      <p>Private Sale & Community Building</p>
    </div>
    <div class="roadmap-card" style="--delay: 0.6s">
      <h3>Q4 2024</h3>
      <p>Public Sale & Exchange Listing</p>
    </div>
  </div>
</section>

<!-- Token Distribution -->
<section id="token-distribution" style="background:#0c0f38; padding: 60px 20px; color: white;">
  <div style="text-align: center; margin-bottom: 40px;">
    <h2 style="font-size: 36px;">Token Distribution</h2>
    <p>Our tokens are distributed for transparency and efficiency.</p>
  </div>
  <div style="display: flex; justify-content: center; gap: 50px; flex-wrap: wrap;">
    <div>
      <canvas id="tokenChart1" width="250" height="250"></canvas>
      <p style="text-align:center; margin-top: 10px;">Distribution</p>
    </div>
    <div>
      <canvas id="tokenChart2" width="250" height="250"></canvas>
      <p style="text-align:center; margin-top: 10px;">Allocation</p>
    </div>
  </div>
</section>

<!-- Team -->
<section id="team" class="section alt">
  <div class="container">
    <h2>Meet Our Team</h2>
    <div class="team-members">
      <div class="member">
        <img src="https://source.unsplash.com/100x100/?man1" alt="Team Member">
        <h4>Jane Doe</h4>
        <p>CEO</p>
      </div>
      <div class="member">
        <img src="https://source.unsplash.com/100x100/?person2" alt="Team Member">
        <h4>John Smith</h4>
        <p>CTO</p>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section id="faq" class="section">
  <div class="container">
    <h2>FAQ</h2>
    <div class="faq">
      <div class="faq-item">
        <h3>What is an ICO?</h3>
        <p>An Initial Coin Offering (ICO) is a way to raise funds for a new cryptocurrency project.</p>
      </div>
      <div class="faq-item">
        <h3>How to participate?</h3>
        <p>Connect your wallet and send BNB to our smart contract address.</p>
      </div>
    </div>
  </div>
</section>

<!-- Blog -->
<section id="blog" class="section alt">
  <div class="container">
    <h2>Our Blog</h2>
    <div class="blog-posts">
      <div class="post">
        <h4>Top 5 ICO Tips</h4>
        <p>Learn the strategies to make your investment safer and more rewarding.</p>
      </div>
      <div class="post">
        <h4>How to analyze a whitepaper?</h4>
        <p>Check key factors before putting money into any project.</p>
      </div>
    </div>
  </div>
</section>

<!-- Contact -->
<section id="contact" class="section">
  <div class="container">
    <h2>Contact Us</h2>
    <form action="contact.php" method="POST" class="contact-form">
      <input type="text" name="name" placeholder="Name" required/>
      <input type="email" name="email" placeholder="Email" required/>
      <textarea name="message" placeholder="Your message here..." required></textarea>
      <button type="submit" class="btn">Send Message</button>
    </form>
  </div>
</section>

<footer class="site-footer">
  <div class="footer-container">
    <div class="footer-column">
      <h3>SatoshiCat</h3>
      <p>Empowering the crypto community with tools, knowledge, and innovative Web3 solutions.</p>
    </div>
    <div class="footer-column">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="#about">About</a></li>
        <li><a href="#roadmap">Roadmap</a></li>
        <li><a href="#team">Team</a></li>
        <li><a href="#faq">FAQ</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </div>
    <div class="footer-column">
      <h4>Contact Us</h4>
      <p>Email: support@satoshicat.org</p>
      <p>Telegram: @satoshicat</p>
      <p>Twitter: @satoshicat_org</p>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2025 SatoshiCat. All Rights Reserved.</p>
  </div>
</footer>


<!-- Chart Script -->
<script>
  const ctx1 = document.getElementById('tokenChart1').getContext('2d');
  new Chart(ctx1, {
    type: 'doughnut',
    data: {
      labels: ['Team', 'Marketing', 'Development', 'Reserve'],
      datasets: [{
        data: [30, 25, 25, 20],
        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { position: 'bottom' } }
    }
  });

  const ctx2 = document.getElementById('tokenChart2').getContext('2d');
  new Chart(ctx2, {
    type: 'pie',
    data: {
      labels: ['Public Sale', 'Private Sale', 'Advisors', 'Bounty'],
      datasets: [{
        data: [40, 30, 20, 10],
        backgroundColor: ['#9966FF', '#FF9F40', '#FF6384', '#36A2EB']
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { position: 'bottom' } }
    }
  });

  document.querySelector('.hamburger').addEventListener('click', function() {
  const navLinks = document.querySelector('.nav-links');
  navLinks.classList.toggle('active');
});

const calculateBtn = document.getElementById("calculateBtn");
const tokenModal = document.getElementById("tokenModal");
const closeModal = document.getElementById("closeModal");
const bnbInput = document.getElementById("bnbInput");
const scatResult = document.getElementById("scatResult");

const rate = 25000; // 1 BNB = 25000 SCAT

calculateBtn.addEventListener("click", () => {
tokenModal.style.display = "flex";
bnbInput.value = "";
scatResult.textContent = "0";
});

closeModal.addEventListener("click", () => {
tokenModal.style.display = "none";
});

bnbInput.addEventListener("input", () => {
const bnbValue = parseFloat(bnbInput.value);
if (!isNaN(bnbValue) && bnbValue > 0) {
scatResult.textContent = (bnbValue * rate).toLocaleString();
} else {
scatResult.textContent = "0";
}
});

// Close modal when clicking outside the content
window.addEventListener("click", (e) => {
if (e.target === tokenModal) {
tokenModal.style.display = "none";
}
});

// Set the target date for countdown (change this as needed)
const targetDate = new Date("2025-05-01T00:00:00").getTime();

const countdown = () => {
const now = new Date().getTime();
const distance = targetDate - now;

const days = Math.floor(distance / (1000 * 60 * 60 * 24));
const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
const seconds = Math.floor((distance % (1000 * 60)) / 1000);

document.getElementById("days").textContent = String(days).padStart(2, '0');
document.getElementById("hours").textContent = String(hours).padStart(2, '0');
document.getElementById("minutes").textContent = String(minutes).padStart(2, '0');
document.getElementById("seconds").textContent = String(seconds).padStart(2, '0');

if (distance < 0) { clearInterval(timer);
    document.getElementById("countdown").innerHTML="<p style='color:#fff;'>ICO Ended</p>" ; } }; const
    timer=setInterval(countdown, 1000); countdown();


 function calculateSCAT() {
    const bnb = parseFloat(document.getElementById("bnbInput").value);
    const rate = 100000; // 1 BNB = 100000 SCAT
    const scat = !isNaN(bnb) ? bnb * rate : 0;
    document.getElementById("scatAmount").innerText = Math.floor(scat);
  }

  function selectToken(selectedId) {
    const allOptions = document.querySelectorAll(".token-option");
    allOptions.forEach(opt => opt.classList.remove("selected-token"));

    const selected = document.getElementById(selectedId);
    selected.classList.add("selected-token");
  }


</script>


</body>
</html>

