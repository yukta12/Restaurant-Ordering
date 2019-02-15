import { ApproxStructure, Assertions, Chain, Logger, Step, UiFinder } from '@ephox/agar';
import { AlloyTriggers, Composing, GuiFactory, Representing } from '@ephox/alloy';
import { UnitTest } from '@ephox/bedrock';
import { Option } from '@ephox/katamari';
import { setupDemo } from 'src/themes/silver/demo/ts/components/DemoHelpers';

import { renderDropZone } from '../../../../../main/ts/ui/dialog/Dropzone';
import { GuiSetup } from '../../../module/AlloyTestUtils';

UnitTest.asynctest('Dropzone component Test', (success, failure) => {
  const helpers = setupDemo();
  const providers = helpers.extras.backstage.shared.providers;

  GuiSetup.setup(
    (store, doc, body) => {
      return GuiFactory.build(
        renderDropZone({
          type: 'dropzone',
          name: 'drop1',
          label: Option.some('Dropzone Label'),
        }, providers)
      );
    },
    (doc, body, gui, component, store) => {
      return [
        Assertions.sAssertStructure(
          'Checking initial structure',
          ApproxStructure.build((s, str, arr) => {
            return s.element('div', {
              children: [
                s.element('label', {
                  classes: [ arr.has('tox-label') ],
                  html: str.is('Dropzone Label')
                }),
                s.element('div', { })
              ]
            });
          }),
          component.element()
        ),

        Logger.t(
          'Trigger drop on zone',
          Chain.asStep(component.element(), [
            UiFinder.cFindIn('.tox-dropzone'),
            Chain.binder(component.getSystem().getByDom),
            Chain.op((zone) => {
              // TODO: Add 'drop' to NativeEvents
              AlloyTriggers.emitWith(zone, 'drop', {
                raw: {
                  dataTransfer: {
                    files: [
                      { name: 'image1.png' },
                      { name: 'image2.bmp' },
                      { name: 'image3.jpg' }
                    ]
                  }
                }
              });
            })
          ])
        ),

        Step.sync(() => {
          const zone = Composing.getCurrent(component).getOrDie(
            'Failed trying to get the zone from the container'
          );
          const filesValue = Representing.getValue(zone);
          Assertions.assertEq('Checking value of dropzone', [
            { name: 'image1.png' },
            { name: 'image3.jpg' }
          ], filesValue);
        })
      ];
    },
    () => {
      helpers.destroy();
      success();
    },
    failure
  );
});