namespace lab9.Model
{
    public interface IHarmonicContainerView
    {
        IHarmonicView[] GetAllPresentation();
        void AddObserver( IObserverHarmonicContainer observer );
    }
}
