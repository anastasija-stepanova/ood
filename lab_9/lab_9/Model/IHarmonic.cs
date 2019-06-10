namespace lab_9.Model
{
    public interface IHarmonic : IHarmonicView
    {
        void SetFrequency(double value);
        void SetPhase(double value);
        void SetAmplitude(double value);
        void SetHarmonicType(HarmonicType harmonicType);
        double GetFrequency();
        double GetPhase();
        double GetAmplitude();
        HarmonicType GetHarmonicType();
        void SetObserver(IObserverHarmoic observer);
    }
}