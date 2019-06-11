namespace lab9.Model
{
    public interface IHarmonicView
    {
        double GetAmplitude();
        double GetFrequency();
        double GetPhase();
        HarmonicType GetHarmonicKind();
    }
}
