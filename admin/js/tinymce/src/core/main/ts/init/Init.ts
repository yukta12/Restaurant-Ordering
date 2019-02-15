/**
 * Copyright (c) Tiny Technologies, Inc. All rights reserved.
 * Licensed under the LGPL or a commercial license.
 * For LGPL see License.txt in the project root for license information.
 * For commercial licenses see https://www.tiny.cloud/
 */

import { Obj, Type } from '@ephox/katamari';
import DOMUtils from '../api/dom/DOMUtils';
import { Editor } from '../api/Editor';
import { IconManager } from '../api/IconManager';
import PluginManager from '../api/PluginManager';
import ThemeManager from '../api/ThemeManager';
import Tools from '../api/util/Tools';
import InitContentBody from './InitContentBody';
import InitIframe from './InitIframe';
import { appendContentCssFromSettings } from './ContentCss';
import { Element } from '@ephox/dom-globals';

const DOM = DOMUtils.DOM;

const initPlugin = function (editor: Editor, initializedPlugins, plugin) {
  const Plugin = PluginManager.get(plugin);

  const pluginUrl = PluginManager.urls[plugin] || editor.documentBaseUrl.replace(/\/$/, '');
  plugin = Tools.trim(plugin);
  if (Plugin && Tools.inArray(initializedPlugins, plugin) === -1) {
    Tools.each(PluginManager.dependencies(plugin), function (dep) {
      initPlugin(editor, initializedPlugins, dep);
    });

    if (editor.plugins[plugin]) {
      return;
    }

    const pluginInstance = new Plugin(editor, pluginUrl, editor.$);

    editor.plugins[plugin] = pluginInstance;

    if (pluginInstance.init) {
      pluginInstance.init(editor, pluginUrl);
      initializedPlugins.push(plugin);
    }
  }
};

const trimLegacyPrefix = function (name: string) {
  // Themes and plugins can be prefixed with - to prevent them from being lazy loaded
  return name.replace(/^\-/, '');
};

const initPlugins = function (editor: Editor) {
  const initializedPlugins = [];

  Tools.each(editor.settings.plugins.split(/[ ,]/), function (name) {
    initPlugin(editor, initializedPlugins, trimLegacyPrefix(name));
  });
};

const initIcons = (editor: Editor) => {
  const iconPackName: string = Tools.trim(editor.settings.icons);

  Obj.each(IconManager.get(iconPackName).icons, (svgData, name) => {
    editor.ui.registry.addIcon(name, svgData);
  });
};

const initTheme = function (editor: Editor) {
  const theme = editor.settings.theme;

  if (Type.isString(theme)) {
    editor.settings.theme = trimLegacyPrefix(theme);

    const Theme = ThemeManager.get(theme);
    editor.theme = new Theme(editor, ThemeManager.urls[theme]);

    if (editor.theme.init) {
      editor.theme.init(editor, ThemeManager.urls[theme] || editor.documentBaseUrl.replace(/\/$/, ''), editor.$);
    }
  } else {
    // Theme set to false or null doesn't produce a theme api
    editor.theme = {};
  }
};

const renderFromLoadedTheme = function (editor: Editor) {
  // Render UI
  return editor.theme.renderUI();
};

const renderFromThemeFunc = function (editor: Editor) {
  const elm = editor.getElement();
  const info = editor.settings.theme(editor, elm);

  if (info.editorContainer.nodeType) {
    info.editorContainer.id = info.editorContainer.id || editor.id + '_parent';
  }

  if (info.iframeContainer && info.iframeContainer.nodeType) {
    info.iframeContainer.id = info.iframeContainer.id || editor.id + '_iframecontainer';
  }

  info.height = info.iframeHeight ? info.iframeHeight : elm.offsetHeight;

  return info;
};

const createThemeFalseResult = function (element: Element) {
  return {
    editorContainer: element,
    iframeContainer: element
  };
};

const renderThemeFalseIframe = function (targetElement: Element) {
  const iframeContainer = DOM.create('div');

  DOM.insertAfter(iframeContainer, targetElement);

  return createThemeFalseResult(iframeContainer);
};

const renderThemeFalse = function (editor: Editor) {
  const targetElement = editor.getElement();
  return editor.inline ? createThemeFalseResult(null) : renderThemeFalseIframe(targetElement);
};

const renderThemeUi = function (editor: Editor) {
  const settings = editor.settings, elm = editor.getElement();

  editor.orgDisplay = elm.style.display;

  if (Type.isString(settings.theme)) {
    return renderFromLoadedTheme(editor);
  } else if (Type.isFunction(settings.theme)) {
    return renderFromThemeFunc(editor);
  } else {
    return renderThemeFalse(editor);
  }
};

const init = function (editor: Editor) {
  editor.fire('ScriptsLoaded');

  initTheme(editor);
  initPlugins(editor);
  initIcons(editor);
  const boxInfo = renderThemeUi(editor);
  editor.editorContainer = boxInfo.editorContainer ? boxInfo.editorContainer : null;
  appendContentCssFromSettings(editor);

  // Content editable mode ends here
  if (editor.inline) {
    return InitContentBody.initContentBody(editor);
  } else {
    return InitIframe.init(editor, boxInfo);
  }
};

export default {
  init
};