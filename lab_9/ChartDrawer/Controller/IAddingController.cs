using lab9.Model;

namespace lab9.Controller
{
    public interface IAddingController
    {
        void Start();
        void SetAmplitude( double value );
        void SetHarmonicKind( HarmonicType kind );
        void SetFrequency( double value );
        void SetPhase( double value );
        void AddNewHarmonic();
        void Cancel();
    }
}
