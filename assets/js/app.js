import Alpine from 'alpinejs'
import {WuploadForm} from "./Components/WuploadForm"

window.Alpine = Alpine;

Alpine.data('WuploadForm', WuploadForm);

Alpine.start()