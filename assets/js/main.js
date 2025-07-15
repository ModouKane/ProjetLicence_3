// ===== DOM Ready =====
document.addEventListener('DOMContentLoaded', function() {
    initNavbar();
    initDataTables();
    initForms();
    initUI();
    initDashboard();
});

// ===== Initialisation de la Navbar =====
function initNavbar() {
    // Menu mobile
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    if (navbarToggler) {
        navbarToggler.addEventListener('click', function() {
            navbarCollapse.classList.toggle('show');
        });
    }

    // Gestion du dropdown
    const dropdowns = document.querySelectorAll('.dropdown-toggle');
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function(e) {
            e.preventDefault();
            const menu = this.nextElementSibling;
            menu.classList.toggle('show');
        });
    });

    // Fermer le dropdown quand on clique ailleurs
    document.addEventListener('click', function(e) {
        if (!e.target.matches('.dropdown-toggle')) {
            const openMenus = document.querySelectorAll('.dropdown-menu.show');
            openMenus.forEach(menu => {
                menu.classList.remove('show');
            });
        }
    });
}

// ===== DataTables Initialisation =====
function initDataTables() {
    if (typeof $ !== 'undefined' && $.fn.DataTable) {
        $('.datatable').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/French.json'
            },
            dom: '<"top"fB>rt<"bottom"lip><"clear">',
            buttons: [
                {
                    extend: 'excel',
                    className: 'btn btn-sm btn-secondary',
                    text: '<i class="bi bi-file-excel"></i> Excel'
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm btn-light',
                    text: '<i class="bi bi-printer"></i> Imprimer'
                }
            ]
        });
    }
}

// ===== Formulaires =====
function initForms() {
    // Validation des formulaires
    const forms = document.querySelectorAll('.needs-validation');
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });

    // Sélecteurs avec Select2
    if (typeof $ !== 'undefined' && $.fn.select2) {
        $('.select2').select2({
            theme: 'bootstrap-5',
            width: '100%'
        });
    }

    // Date picker
    if (typeof flatpickr !== 'undefined') {
        flatpickr('.datepicker', {
            dateFormat: 'd/m/Y',
            locale: 'fr'
        });
    }
}

// ===== UI Interactions =====
function initUI() {
    // Tooltips
    if (typeof $ !== 'undefined' && $.fn.tooltip) {
        $('[data-bs-toggle="tooltip"]').tooltip();
    }

    // Confirmation des actions
    const confirmActions = document.querySelectorAll('.confirm-action');
    confirmActions.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!confirm(this.dataset.message || 'Êtes-vous sûr de vouloir effectuer cette action ?')) {
                e.preventDefault();
            }
        });
    });

    // Animation des cartes au scroll
    const animateOnScroll = function() {
        const cards = document.querySelectorAll('.fade-in');
        cards.forEach(card => {
            const cardPosition = card.getBoundingClientRect().top;
            const screenPosition = window.innerHeight / 1.3;
            
            if (cardPosition < screenPosition) {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }
        });
    };

    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Exécuter une fois au chargement
}

// ===== Dashboard =====
function initDashboard() {
    // Graphiques avec Chart.js
    if (typeof Chart !== 'undefined') {
        const ctx = document.getElementById('dashboardChart');
        if (ctx) {
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                    datasets: [{
                        label: 'Nouveaux étudiants',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: 'rgba(52, 152, 219, 0.7)',
                        borderColor: 'rgba(52, 152, 219, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Notes moyennes',
                        data: [14, 12, 15, 13, 14, 15],
                        backgroundColor: 'rgba(46, 204, 113, 0.7)',
                        borderColor: 'rgba(46, 204, 113, 1)',
                        borderWidth: 1,
                        type: 'line',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    }

    // Compteurs animés
    const counterElements = document.querySelectorAll('.counter');
    if (counterElements.length > 0) {
        counterElements.forEach(element => {
            const target = +element.getAttribute('data-target');
            const duration = 2000; // 2 secondes
            const step = target / (duration / 16); // 60fps
            
            let current = 0;
            const incrementCounter = () => {
                current += step;
                if (current < target) {
                    element.textContent = Math.floor(current);
                    requestAnimationFrame(incrementCounter);
                } else {
                    element.textContent = target;
                }
            };
            
            // Démarrer l'animation quand l'élément est visible
            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    incrementCounter();
                    observer.unobserve(element);
                }
            });
            
            observer.observe(element);
        });
    }
}

// ===== Gestion des Messages Flash =====
function initFlashMessages() {
    const flashMessages = document.querySelectorAll('.alert');
    flashMessages.forEach(message => {
        setTimeout(() => {
            message.style.transition = 'opacity 0.5s ease';
            message.style.opacity = '0';
            setTimeout(() => message.remove(), 500);
        }, 5000);
    });
}

// ===== Export des Fonctions =====
window.EduManage = {
    initNavbar,
    initDataTables,
    initForms,
    initUI,
    initDashboard,
    initFlashMessages
};

// Initialiser les messages flash au chargement
initFlashMessages();