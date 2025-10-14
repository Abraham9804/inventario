import './bootstrap';
import './flowbite.min.js';
import './fontawesome.js';
import '../../vendor/rappasoft/laravel-livewire-tables/resources/imports/laravel-livewire-tables-all.js';
import Swal from 'sweetalert2';
window.Swal = Swal;

import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css";
window.Dropzone = Dropzone;
Dropzone.autoDiscover = false;