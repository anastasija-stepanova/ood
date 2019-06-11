using lab9.Model;

namespace lab9_tests
{
    public class HarmonicObserver : IObserverHarmoic
    {
        public bool PropertiesChanged { get; set; }

        public HarmonicObserver()
        {
            PropertiesChanged = false;
        }

        public void HarmonicPropertiesChanged()
        {
            PropertiesChanged = true;
        }
    }
}
