import './bootstrap';

import Alpine from 'alpinejs';


new DataTable('#workerTable');
$(document).ready( function () {
    $('#workerTable').DataTable();
} );

window.Alpine = Alpine;

Alpine.start();
