using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using lab_9.Model;
using lab_9.View;

namespace lab_9.Controller
{
    public class AddingController : IAddingController
    {
        private IHarmonic _harmonic;
        private IHarmonicContainer _harmonicContainer;
        private AddingHarmonicView _addingNewHarmonicsView;
        private IObserverHarmoic _newHarmonicObserver;

        public AddingController(IHarmonicContainer harmonicContainer, IObserverHarmoic newHarmonicObserver)
        {
            _harmonicContainer = harmonicContainer;
            _newHarmonicObserver = newHarmonicObserver;
            _harmonic = new Harmonic();
            _addingNewHarmonicsView = new AddingHarmonicView(_harmonic, this);
            _harmonic.SetObserver(_addingNewHarmonicsView);
        }

        public void AddHarmonic()
        {
            _harmonic.SetObserver(_newHarmonicObserver);
            _harmonicContainer.AddHarmonic(_harmonic);
            _addingNewHarmonicsView.Close();
        }

        public void Exit()
        {
            _addingNewHarmonicsView.Close();
        }

        public void Run()
        {
            _addingNewHarmonicsView.Show();
        }

        public void SetAmplitude(double value)
        {
            _harmonic.SetAmplitude(value);
        }

        public void SetFrequency(double value)
        {
            _harmonic.SetFrequency(value);
        }

        public void SetHarmonicType(HarmonicType harmonicType)
        {
            _harmonic.SetHarmonicType(harmonicType);
        }

        public void SetPhase(double value)
        {
            _harmonic.SetPhase(value);
        }
    }
}
