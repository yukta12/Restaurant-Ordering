import { Keyboard, FocusTools, Keys } from '@ephox/agar';
import { GuiFactory, Behaviour, AddEventsBehaviour, AlloyEvents } from '@ephox/alloy';
import { UnitTest } from '@ephox/bedrock';

import { renderCheckbox } from '../../../../../main/ts/ui/general/Checkbox';
import { GuiSetup } from '../../../module/AlloyTestUtils';
import { formChangeEvent } from 'tinymce/themes/silver/ui/general/FormEvents';
import I18n from 'tinymce/core/api/util/I18n';

UnitTest.asynctest('Checkbox component Test', (success, failure) => {
  const providers = {
    icons: () => <Record<string, string>> {},
    menuItems: () => <Record<string, any>> {},
    translate: I18n.translate
  };

  GuiSetup.setup(
    (store, doc, body) => {
      return GuiFactory.build(
        {
          dom: {
            tag: 'div'
          },
          components: [
            renderCheckbox({
              label: 'TestCheckbox',
              name: 'test-check-box'
            }, providers)
          ],
          behaviours: Behaviour.derive([
            AddEventsBehaviour.config('test-checkbox', [
              AlloyEvents.run(formChangeEvent, (component, event) => {
                store.adder((event.event() as any).name())();
              })
            ])
          ])
        }
      );
    },
    (doc, body, gui, component, store) => {
      return [
        FocusTools.sSetFocus('Focus checkbox', body, '.tox-checkbox__input'),
        Keyboard.sKeydown(doc, Keys.enter(), {}),
        store.sAssertEq('Form change should have fired', ['test-check-box'])
      ];
    },
    success,
    failure
  );
});