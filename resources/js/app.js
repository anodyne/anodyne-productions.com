import Alpine from 'alpinejs';
import Focus from '@alpinejs/focus';
import Collapse from '@alpinejs/collapse';
import AlpineFloatingUI from '@awcodes/alpine-floating-ui';
import AppearanceModeToggle from './appearance-mode-toggle';
import '../../vendor/wire-elements/pro/resources/js/overlay-component.js';

Alpine.plugin(Focus);
Alpine.plugin(Collapse);
Alpine.plugin(AlpineFloatingUI);

Alpine.data('appearanceModeToggle', AppearanceModeToggle);

window.Alpine = Alpine;

Alpine.start();
