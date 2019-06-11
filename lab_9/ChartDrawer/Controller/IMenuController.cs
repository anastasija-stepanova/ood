using lab9.Model;

namespace lab9.Controller
{
    public interface IMenuController
    {
        void RemoveHarmonic( int index );
        void SetNewAmplitude( int index, double value );
        void SetNewFrequency( int index, double value );
        void SetNewPhase( int index, double value );
        void SetNewHarmonicKind( int index, HarmonicType value );
        void StartAddingNewHarmonic();
    }
}
