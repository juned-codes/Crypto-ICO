document.addEventListener('DOMContentLoaded', () => {
    const connectBtn = document.getElementById('connectBtn');
    const walletAddress = document.getElementById('walletAddress');
    const balanceInfo = document.getElementById('balanceInfo');
    const bnbBalance = document.getElementById('bnbBalance');
    let web3;
    let modal = document.getElementById("buyModal");
    let closeBtn = document.querySelector(".close");
    let isConnected = false;

    const TWO_HOURS = 2 * 60 * 60 * 1000; // 2 hours in milliseconds

    async function connectWallet(event) {
        if (event) event.preventDefault();

        if (typeof window.ethereum === 'undefined') {
            Swal.fire({
                title: 'MetaMask Not Detected',
                text: 'Please install MetaMask to connect your wallet.',
                icon: 'error',
                confirmButtonColor: '#ffc107'
            });
            return;
        }

        try {
            const accounts = await window.ethereum.request({
                method: 'eth_requestAccounts'
            });

            const account = accounts[0];
            web3 = new Web3(window.ethereum);

            localStorage.setItem('connectedWallet', account);
            localStorage.setItem('connectedAt', Date.now().toString());

            isConnected = true;
            updateUI(account);

            Swal.fire({
                title: '<span style="color:#28a745;">Wallet Connected!</span>',
                html: `<b style="color:black;">Address:</b><br><code style="color:#000">${account}</code>`,
                icon: 'success',
                background: '#fff8dc',
                iconColor: '#28a745',
                confirmButtonColor: '#ffc107',
                showClass: {
                    popup: 'animate__animated animate__bounceIn'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOut'
                }
            });

            window.ethereum.on('accountsChanged', (newAccounts) => {
                if (newAccounts.length === 0) {
                    resetWallet();
                } else {
                    connectWallet();
                }
            });

            window.ethereum.on('chainChanged', () => {
                window.location.reload();
            });

        } catch (error) {
            console.error('Connection error:', error);
            Swal.fire({
                title: 'Connection Failed',
                text: 'Please try again.',
                icon: 'error',
                confirmButtonColor: '#ffc107'
            });
        }
    }

    function copyAddress() {
        const input = document.getElementById("bscAddress");
        input.select();
        document.execCommand("copy");
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: 'Address copied!',
            showConfirmButton: false,
            timer: 1500
        });
    }

    async function updateUI(account) {
        connectBtn.textContent = 'Buy Now';
        connectBtn.style.backgroundColor = '#28a745';
        walletAddress.textContent = `Connected: ${account.slice(0, 6)}...${account.slice(-4)}`;
        walletAddress.style.display = 'block';

        try {
            const currentAccounts = await web3.eth.getAccounts();
            if (currentAccounts.length === 0) {
                resetWallet();
                return;
            }

            const balanceWei = await web3.eth.getBalance(currentAccounts[0]);
            const balanceBNB = web3.utils.fromWei(balanceWei, 'ether');

            bnbBalance.textContent = parseFloat(balanceBNB).toLocaleString('en', {
                minimumFractionDigits: 4,
                maximumFractionDigits: 8
            });

            balanceInfo.style.display = 'block';
        } catch (error) {
            console.error('Balance fetch error:', error);
            balanceInfo.style.display = 'none';
            Swal.fire({
                title: 'Balance Update Failed',
                text: 'Could not fetch wallet balance. Please try again.',
                icon: 'error',
                confirmButtonColor: '#ffc107'
            });
        }
    }

    function resetWallet() {
        localStorage.removeItem('connectedWallet');
        localStorage.removeItem('connectedAt');
        connectBtn.textContent = 'Connect Wallet';
        connectBtn.style.backgroundColor = '';
        walletAddress.style.display = 'none';
        balanceInfo.style.display = 'none';
        isConnected = false;
    }

    async function initWalletSession() {
        const savedWallet = localStorage.getItem('connectedWallet');
        const savedTime = localStorage.getItem('connectedAt');

        if (savedWallet && savedTime) {
            const now = Date.now();
            const timeElapsed = now - parseInt(savedTime);

            if (timeElapsed < TWO_HOURS) {
                if (typeof window.ethereum !== 'undefined') {
                    web3 = new Web3(window.ethereum);
                    const accounts = await window.ethereum.request({ method: 'eth_accounts' });

                    if (accounts.length > 0 && accounts[0].toLowerCase() === savedWallet.toLowerCase()) {
                        isConnected = true;
                        updateUI(savedWallet);
                    } else {
                        resetWallet();
                    }
                }
            } else {
                resetWallet();
            }
        }
    }

    connectBtn.addEventListener('click', (e) => {
        if (isConnected) {
            // Show Modal if already connected
            modal.style.display = "block";
        } else {
            connectWallet(e);
        }
    });

    // Close modal on clicking the X
    closeBtn.onclick = function () {
        modal.style.display = "none";
    }

    // Close modal when clicking outside the modal
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }

    initWalletSession();
});



// Add this JavaScript code
let timerInterval;
const orderDuration = 30 * 60; // 30 minutes in seconds

async function showOrderModal() {
    const modal = document.getElementById("buyModal");
    modal.style.display = "block";

    // Check existing order
    const response = await fetch('check_order.php');
    const data = await response.json();

    if (data.exists) {
        // Show existing order
        document.getElementById('bscAddress').value = data.address;
        startTimer(data.remaining);
    } else {
        // Generate new order
        generateNewOrder();
        startTimer(orderDuration);
    }
}

function generateNewOrder() {
    const orderData = {
        timestamp: Math.floor(Date.now() / 1000),
        address: generateBSCAddress(), // Implement your address generation logic
        ip: getClientIP() // Implement IP detection
    };

    // Save order to server
    fetch('save_order.php', {
        method: 'POST',
        body: JSON.stringify(orderData)
    });
}

function startTimer(duration) {
    let timer = duration;
    updateTimerDisplay(timer);

    timerInterval = setInterval(() => {
        timer--;
        updateTimerDisplay(timer);

        if (timer <= 0) {
            clearInterval(timerInterval);
            document.getElementById("buyModal").style.display = "none";
        }
    }, 1000);
}

function updateTimerDisplay(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
    const display = `${minutes}:${remainingSeconds.toString().padStart(2, '0')}`;
    document.querySelectorAll('#timer, #timer2').forEach(el => el.textContent = display);
}

// Update your existing connect button click handler
connectBtn.addEventListener('click', (e) => {
    if (isConnected) {
        showOrderModal();
    } else {
        connectWallet(e);
    }
});