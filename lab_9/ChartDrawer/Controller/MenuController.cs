using lab9.Model;
using lab9.View.MainMenu;

namespace lab9.Controller
{
    public class MenuController : IMenuController
    {
        private IHarmonicContainer _harmonicContainer;
        public MainMenuView MenuView { private set; get; }

        public MenuController( IHarmonicContainer harmonicContainer )
        {
            _harmonicContainer = harmonicContainer;
            MenuView = new MainMenuView( _harmonicContainer, this );
            _harmonicContainer.AddObserver( MenuView );
        }

        public void RemoveHarmonic( int index )
        {
            _harmonicContainer.RemoveHarmonic( index );
        }

        public void SetNewAmplitude( int index, double value )
        {
            _harmonicContainer.GetAllHarmonic()[ index ].SetAmplitude( value );
        }

        public void SetNewFrequency( int index, double value )
        {
            _harmonicContainer.GetAllHarmonic() [ index ].SetFrequency( value );
        }

        public void SetNewPhase( int index, double value )
        {
            _harmonicContainer.GetAllHarmonic() [ index ].SetPhase( value );
        }

        public void SetNewHarmonicKind( int index, HarmonicType value )
        {
            _harmonicContainer.GetAllHarmonic() [ index ].SetHarmonicKind( value );
        }

        public void StartAddingNewHarmonic()
        {
            var addingHarmonicController = new AddingController( _harmonicContainer, MenuView );
            addingHarmonicController.Start();
        }
    }
}
