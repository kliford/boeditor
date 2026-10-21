
(() => {
  'use strict';

  const existingConfig =
    window.defaultTinyMceConfig
    && typeof window.defaultTinyMceConfig === 'object'
      ? window.defaultTinyMceConfig
      : {};

  const isRtl = String(window.lang_is_rtl || '') === '1';

  const contentStyles = [];

  if (
    typeof existingConfig.content_style === 'string'
    && existingConfig.content_style.trim() !== ''
  ) {
    contentStyles.push(existingConfig.content_style.trim());
  }

  if (isRtl) {
    contentStyles.push('body { direction: rtl; }');
  }

  contentStyles.push(
    'body { font-size: 14pt !important; }'
  );

  window.defaultTinyMceConfig = {
    ...existingConfig,

    toolbar1:
      'fontsizeselect,fontselect,code,colorpicker,bold,italic,'
      + 'underline,strikethrough,blockquote,link,align,'
      + 'bullist,numlist,table,image,media,formatselect,hr',

    toolbar2: '',

    content_style: contentStyles.join(' '),
  };
})();
