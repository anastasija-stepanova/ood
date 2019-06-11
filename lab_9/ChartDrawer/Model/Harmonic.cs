namespace lab9.Model
{
    public class Harmonic : IHarmonic
    {
        private double _amplitude;
        private double _frequency;
        private double _phase;
        private HarmonicType _harmonicKind;
        private IObserverHarmoic _observer;

        public Harmonic(double amplitude, double frequency, double phase, HarmonicType harmonicKind )
        {
            _amplitude = amplitude;
            _frequency = frequency;
            _phase = phase;
            _harmonicKind = harmonicKind;
        }

        public Harmonic()
        {
            _harmonicKind = HarmonicType.Sin;
            _amplitude = 1;
            _frequency = 1;
            _phase = 0;
        }

        public void SetAmplitude( double amplitude )
        {
            _amplitude = amplitude;
            if (_observer != null)
            {
                _observer.HarmonicPropertiesChanged();
            }
        }

        public void SetFrequency( double frequency )
        {
            _frequency = frequency;
            if ( _observer != null )
            {
                _observer.HarmonicPropertiesChanged();
            }
        }

        public void SetPhase( double phase )
        {
            _phase = phase;
            if ( _observer != null )
            {
                _observer.HarmonicPropertiesChanged();
            }
        }

        public void SetHarmonicKind(HarmonicType harmonicKind)
        {
            _harmonicKind = harmonicKind;
            if ( _observer != null )
            {
                _observer.HarmonicPropertiesChanged();
            }
        }

        public HarmonicType GetHarmonicKind()
        {
            return _harmonicKind;
        }

        public double GetAmplitude()
        {
            return _amplitude;
        }

        public double GetFrequency()
        {
            return _frequency;
        }

        public double GetPhase()
        {
            return _phase;
        }

        public void SetObserver( IObserverHarmoic observer )
        {
            _observer = observer;
        }
    }
}
