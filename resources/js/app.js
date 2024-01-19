import './bootstrap';
import Alpine from 'alpinejs';
import 'datatables.net';

window.Alpine = Alpine;

document.addEventListener('alpine:init', () => {
    Alpine.data('companies', () => ({
        init() {
            this.initializeDataTable();
        },
        initializeDataTable() {
            const tableSelector = '#companiesTable';
            const dataTable = $(tableSelector).DataTable();

            if (dataTable) {
                dataTable.destroy();
            }

            $(tableSelector).DataTable({
                responsive: true,
                order: [[0, 'asc']],
                lengthMenu: [10, 25, 50, 100],
                language: {
                    search: 'Search:',
                    paginate: {
                        next: 'Next',
                        previous: 'Previous'
                    }
                },
            });
        },
    }));
});

Alpine.start();
