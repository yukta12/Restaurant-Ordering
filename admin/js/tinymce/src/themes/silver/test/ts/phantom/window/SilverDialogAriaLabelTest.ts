import { Chain, Pipeline, UiFinder, Step, NamedChain, GeneralSteps, Logger } from '@ephox/agar';
import { UnitTest } from '@ephox/bedrock';
import { Body, Element, Attr } from '@ephox/sugar';
import WindowManager from 'tinymce/themes/silver/ui/dialog/WindowManager';

import { setupDemo } from '../../../../demo/ts/components/DemoHelpers';
import { GuiSetup } from '../../module/AlloyTestUtils';
import { document } from '@ephox/dom-globals';
import { Result, Fun } from '@ephox/katamari';

UnitTest.asynctest('WindowManager:inline-dialog Test', (success, failure) => {
  const helpers = setupDemo();
  const windowManager = WindowManager.setup(helpers.extras);

  const cGetDialogLabelId = Chain.binder((dialogE: Element) => {
    if (Attr.has(dialogE, 'aria-labelledby')) {
      const labelId = Attr.get(dialogE, 'aria-labelledby');
      return labelId.length > 0 ? Result.value(labelId) : Result.error('Dialog has zero length aria-labelledby attribute');
    } else {
      return Result.error('Dialog has no aria-labelledby attribute');
    }
  });

  const sAssertDialogLabelledBy =
    Chain.asStep(Body.body(), [NamedChain.asChain([
      NamedChain.direct(NamedChain.inputName(), UiFinder.cFindIn('[role="dialog"]'), 'dialog'),
      NamedChain.direct('dialog', cGetDialogLabelId, 'labelId'),
      NamedChain.bundle((obj) => UiFinder.findIn(obj.dialog, `#${obj.labelId}`)),
    ])]);

  const sTestDialogLabelled = (params) =>
    Logger.t(
      `Dialog should have "aria-labelledby" for config "${JSON.stringify(params)}"`,
      GeneralSteps.sequence([
        Step.sync(() => {
            const dialogSpec = {
              title: 'Silver Test Inline (Toolbar) Dialog',
              body: {
                type: 'panel',
                items: []
              },
              buttons: [],
              initialData: {}
            };
            windowManager.open(dialogSpec, params, Fun.noop );
        }),
        sAssertDialogLabelledBy,
      ])
    );

  Pipeline.async({}, [
    GuiSetup.mAddStyles(Element.fromDom(document), [
      '.tox-dialog { background: white; border: 2px solid black; padding: 1em; margin: 1em; }'
    ]),
    sTestDialogLabelled({ inline: 'toolbar' }),
    sTestDialogLabelled({ inline: 'not-inline!!' }),
    GuiSetup.mRemoveStyles
  ], () => {
    helpers.destroy();
    success();
  }, failure);
});