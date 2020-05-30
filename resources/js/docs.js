import hljs from 'highlight.js/lib/highlight';
import css from 'highlight.js/lib/languages/css';
import php from 'highlight.js/lib/languages/php';
import xml from 'highlight.js/lib/languages/xml';
import bash from 'highlight.js/lib/languages/bash';
import nginx from 'highlight.js/lib/languages/nginx';
import apache from 'highlight.js/lib/languages/apache';
import javascript from 'highlight.js/lib/languages/javascript';

hljs.registerLanguage('css', css);
hljs.registerLanguage('php', php);
hljs.registerLanguage('xml', xml);
hljs.registerLanguage('bash', bash);
hljs.registerLanguage('nginx', nginx);
hljs.registerLanguage('apache', apache);
hljs.registerLanguage('javascript', javascript);

hljs.initHighlightingOnLoad();
