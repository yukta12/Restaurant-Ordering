import { ApproxStructure, Assertions, Chain, FocusTools, Mouse, UiFinder } from '@ephox/agar';
import { GuiFactory, NativeEvents } from '@ephox/alloy';
import { UnitTest } from '@ephox/bedrock';
import { Option } from '@ephox/katamari';
import { setupDemo } from 'src/themes/silver/demo/ts/components/DemoHelpers';

import { renderSizeInput } from '../../../../../main/ts/ui/dialog/SizeInput';
import { GuiSetup } from '../../../module/AlloyTestUtils';
import { DomSteps } from '../../../module/DomSteps';
import { RepresentingSteps } from '../../../module/ReperesentingSteps';

UnitTest.asynctest('SizeInput component Test', (success, failure) => {
  const helpers = setupDemo();
  const providers = helpers.extras.backstage.shared.providers;

  GuiSetup.setup(
    (store, doc, body) => {
      return GuiFactory.build(
        renderSizeInput({
          type: 'sizeinput',
          name: 'dimensions',
          label: Option.some('size'),
          constrain: true
        }, providers)
      );
    },
    (doc, body, gui, component, store) => {

      const sTriggerInput = DomSteps.sTriggerEventOnFocused('input("input")', component, NativeEvents.input());

      const sSetDimensions = (width, height) => RepresentingSteps.sSetValue('dimensions', component, { width, height });

      const sAssertDimensions = (width, height) => RepresentingSteps.sAssertValue('dimensions', { width, height }, component);

      const sAssertLocked = (locked) =>
        Chain.asStep(component.element(), [
          UiFinder.cFindIn('.tox-lock'),
          Chain.op((lock) => {
            Assertions.assertStructure(
              'Checking lock has toggled',
              ApproxStructure.build((s, str, arr) => {
                return s.element('button', {
                  classes: [
                    arr.has('tox-lock'),
                    arr.has('tox-button'),
                    (locked ? arr.has : arr.not)('tox-locked')]
                });
              }),
              lock
            );
          })
        ]);

      return [
        Assertions.sAssertStructure(
          'Checking initial structure',
          ApproxStructure.build((s, str, arr) => {
            return s.element('div', {
              classes: [arr.has('tox-form__group')],
              children: [
                s.element('div', {
                  classes: [arr.has('tox-form__controls-h-stack')],
                  children: [
                    s.element('div', {
                      children: [
                        s.element('label', {
                          classes: [arr.has('tox-label')],
                          html: str.is('Width')
                        }),
                        s.element('input', {
                          classes: [arr.has('tox-textfield')],
                          attrs: {
                            'data-alloy-tabstop': str.is('true')
                          }
                        })
                      ]
                    }),
                    s.element('div', {
                      children: [
                        s.element('label', {
                          classes: [arr.has('tox-label')],
                          html: str.is('Height')
                        }),
                        s.element('div', {
                          children: [
                            s.element('input', {
                              classes: [arr.has('tox-textfield')],
                              attrs: {
                                'data-alloy-tabstop': str.is('true')
                              }
                            }),
                            s.element('button', {
                              classes: [arr.has('tox-lock'), arr.has('tox-button'), arr.has('tox-locked')]
                            })
                          ]
                        })
                      ]
                    })
                  ]
                })
              ]
            });
          }),
          component.element()
        ),
        sAssertLocked(true),
        sSetDimensions('100px', '200px'),
        FocusTools.sSetFocus('Focusing the first field', component.element(), 'input:first'),
        FocusTools.sSetActiveValue(doc, '50'),
        sTriggerInput,
        sAssertDimensions('50', '100px'),
        // toggle off the lock
        Mouse.sClickOn(component.element(), 'button.tox-lock'),
        sAssertLocked(false),
        // now when we update the first field it will not update the second field
        FocusTools.sSetFocus('Focusing the first field', component.element(), 'input:first'),
        FocusTools.sSetActiveValue(doc, '300px'),
        sTriggerInput,
        sAssertDimensions('300px', '100px')
      ];
    },
    () => {
      helpers.destroy();
      success();
    },
    failure
  );
});