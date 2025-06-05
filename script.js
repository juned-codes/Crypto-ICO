document.addEventListener("DOMContentLoaded", function () {
    const ctx1 = document.getElementById("tokenChart1").getContext("2d");
    const ctx2 = document.getElementById("tokenChart2").getContext("2d");

    if (ctx1) {
        new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: ["Private Sale", "Public Sale", "Team", "Bounty"],
                datasets: [{
                    data: [25, 35, 20, 20],
                    backgroundColor: ["#FEC400", "#5F63F2", "#00CFE8", "#FF4C51"],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '50%',
                plugins: {
                    legend: {
                        labels: {
                            color: '#fff'
                        }
                    }
                }
            }
        });
    }

    if (ctx2) {
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ["Development", "Marketing", "Reserve", "Partnership"],
                datasets: [{
                    data: [40, 25, 20, 15],
                    backgroundColor: ["#28C76F", "#EA5455", "#7367F0", "#FF9F43"],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '50%',
                plugins: {
                    legend: {
                        labels: {
                            color: '#fff'
                        }
                    }
                }
            }
        });
    }
});

document.querySelector('.hamburger').addEventListener('click', function() {
  const navLinks = document.querySelector('.nav-links');
  navLinks.classList.toggle('active');
});