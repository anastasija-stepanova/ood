namespace lab_9.Model
{
    public interface IHarmonicView
    {
        double GetFrequency();
        double GetPhase();
        double GetAmplitude();
        HarmonicType GetHarmonicType();
    }
}
