namespace lab9.Model
{
    public interface IHarmonic : IHarmonicView
    {
        void SetAmplitude( double amplitude );
        void SetFrequency( double frequency );
        void SetPhase( double phase );
        void SetHarmonicKind( HarmonicType kind );
        void SetObserver( IObserverHarmoic harmonicObserver );
    }
}
