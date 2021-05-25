require('./bootstrap');

import 'alpinejs';

import hljs from 'highlight.js/lib/core';
import css from 'highlight.js/lib/languages/css';
import javascript from 'highlight.js/lib/languages/javascript';
import markdown from 'highlight.js/lib/languages/markdown';
import php from 'highlight.js/lib/languages/php';
import xml from 'highlight.js/lib/languages/xml';

hljs.registerLanguage('css', css);
hljs.registerLanguage('html', xml);
hljs.registerLanguage('js', javascript);
hljs.registerLanguage('md', markdown);
hljs.registerLanguage('php', php);

hljs.highlightAll();
