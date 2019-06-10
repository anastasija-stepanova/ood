using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using lab_9.Model;
using lab_9.View;

namespace lab_9.Controller
{
    class MenuController : IMenuController
    {
        private IHarmonicContainer _harmonicContainer;
        public Menu Menu { private set; get; }

        public MenuController(IHarmonicContainer harmonicContainer)
        {
            _harmonicContainer = harmonicContainer;
            Menu = new Menu(_harmonicContainer, this);
            _harmonicContainer.SetObserver(Menu);
        }

        public void DeleteHarmonic(int index)
        {
            _harmonicContainer.RemoveHarmonic(index);
        }

        public void SetAmplitude(int index, double value)
        {
            _harmonicContainer.GetHarmonics()[index].SetAmplitude(value);
        }

        public void SetFrequency(int index, double value)
        {
            _harmonicContainer.GetHarmonics()[index].SetFrequency(value);
        }

        public void SetHarmonicType(int index, HarmonicType value)
        {
            _harmonicContainer.GetHarmonics()[index].SetHarmonicType(value);
        }

        public void SetPhase(int index, double value)
        {
            _harmonicContainer.GetHarmonics()[index].SetPhase(value);
        }

        public void StartAddingHarmonic()
        {
            var addingController = new AddingController(_harmonicContainer, Menu);
            addingController.Run();
        }
    }
}
