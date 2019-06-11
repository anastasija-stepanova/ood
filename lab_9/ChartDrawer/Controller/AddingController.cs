using lab9.Model;
using lab9.View;
using lab9.View.AddingHarmonic;

namespace lab9.Controller
{
    public class AddingController : IAddingController
    {
        private IHarmonicContainer _harmonicContainer;
        private IHarmonic _harmonic;
        private AddingHarmonicsView _addingNewHarmonicsView;
        private IObserverHarmoic _newHarmonicObserver;

        public AddingController( IHarmonicContainer harmonicContainer, IObserverHarmoic newHarmonicObserver )
        {
            _harmonicContainer = harmonicContainer;
            _newHarmonicObserver = newHarmonicObserver;
            _harmonic = new Harmonic();
            _addingNewHarmonicsView = new AddingHarmonicsView( _harmonic, this );
            _harmonic.SetObserver( _addingNewHarmonicsView );
        }

        public void Start()
        {
            _addingNewHarmonicsView.Show();
        }

        public void AddNewHarmonic()
        {
            _harmonic.SetObserver( _newHarmonicObserver );
            _harmonicContainer.AddHarmonic( _harmonic );
            _addingNewHarmonicsView.Close();
        }

        public void Cancel()
        {
            _addingNewHarmonicsView.Close();
        }

        public void SetAmplitude( double value )
        {
            _harmonic.SetAmplitude( value );
        }

        public void SetFrequency( double value )
        {
            _harmonic.SetFrequency( value );
        }

        public void SetHarmonicKind( HarmonicType kind )
        {
            _harmonic.SetHarmonicKind( kind );
        }

        public void SetPhase( double value )
        {
            _harmonic.SetPhase( value );
        }
    }
}
