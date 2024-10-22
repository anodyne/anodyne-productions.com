import Focus from '@alpinejs/focus';
import Collapse from '@alpinejs/collapse';
import AlpineFloatingUI from '@awcodes/alpine-floating-ui';
import AppearanceModeToggle from './appearance-mode-toggle';
import '../../vendor/wire-elements/pro/resources/js/overlay-component.js';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('appearanceModeToggle', AppearanceModeToggle);

    window.Alpine.plugin(Focus);
    window.Alpine.plugin(Collapse);
    window.Alpine.plugin(AlpineFloatingUI);
});
