using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace lab_9.Model
{
    public class Harmonic : IHarmonic, IHarmonicView
    {
        private double _amplitude;
        private double _frequency;
        private double _phase;
        private HarmonicType _harmonicType;
        private IObserverHarmoic _observerHarmoic;

        public Harmonic()
        {
            _harmonicType = HarmonicType.Sin;
            _amplitude = 1;
            _frequency = 1;
            _phase = 0;
        }

        public Harmonic(double amplitude, double frequency, double phase, HarmonicType harmonicType)
        {
            _amplitude = amplitude;
            _frequency = frequency;
            _phase = phase;
            _harmonicType = harmonicType;
        }

        public double GetAmplitude()
        {
            return _amplitude;
        }

        public double GetFrequency()
        {
            return _frequency;
        }

        public HarmonicType GetHarmonicType()
        {
            return _harmonicType;
        }

        public double GetPhase()
        {
            return _phase;
        }

        public void SetAmplitude(double value)
        {
            _amplitude = value;
            if (_observerHarmoic != null)
            {
                _observerHarmoic.PropertyChanges();
            }
        }

        public void SetFrequency(double value)
        {
            _frequency = value;
            if (_observerHarmoic != null)
            {
                _observerHarmoic.PropertyChanges();
            }
        }

        public void SetHarmonicType(HarmonicType harmonicType)
        {
            _harmonicType = harmonicType;
            if (_observerHarmoic != null)
            {
                _observerHarmoic.PropertyChanges();
            }
        }

        public void SetObserver(IObserverHarmoic observer)
        {
            _observerHarmoic = observer;
        }

        public void SetPhase(double value)
        {
            _phase = value;
            if (_observerHarmoic != null)
            {
                _observerHarmoic.PropertyChanges();
            }
        }
    }
}
