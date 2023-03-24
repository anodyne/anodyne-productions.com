export default () => ({
    init() {
        this.update(localStorage.mode);
    },

    isDarkMode() {
        return localStorage.mode === 'dark' || (!('mode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
    },

    isDarkModeSelected() {
        return localStorage.mode === 'dark';
    },

    isLightMode() {
        return localStorage.mode === 'light' || (!('mode' in localStorage) && !window.matchMedia('(prefers-color-scheme: dark)').matches);
    },

    isLightModeSelected() {
        return localStorage.mode === 'light';
    },

    isSystemModeSelected() {
        return !('mode' in localStorage);
    },

    refreshMode() {
        if (localStorage.mode === 'dark' || (!('mode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    },

    setMode(mode = null) {
        this.update(mode);

        this.refreshMode();

        window.location.reload(false);
    },

    update(mode = null) {
        if (mode === 'light' || mode === 'dark') {
            localStorage.mode = mode;
        } else {
            localStorage.removeItem('mode');
        }
    },
});
