using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace lab_9.Model
{
    public class HarmonicContainer : IHarmonicContainer
    {
        private List<IHarmonic> _harmonics = new List<IHarmonic>();
        private IObserverHarmonicContainer _observer;

        public HarmonicContainer()
        {
        }

        public void AddHarmonic(IHarmonic harmonic)
        {
            _harmonics.Add(harmonic);
            if (_observer != null)
            {
                _observer.AddedHarmonic(_harmonics.Count - 1);
            }
        }

        public void RemoveHarmonic(int index)
        {
            if (index >= 0 && index < _harmonics.Count)
            {
                _harmonics.RemoveAt(index);
                if (_observer != null)
                {
                    _observer.RemovedHarmonic(index);
                }
                return;
            }
        }
        
        public int GetHarmonicCount()
        {
            return _harmonics.Count;
        }

        public void SetObserver(IObserverHarmonicContainer observer)
        {
            _observer = observer;
        }

        public IHarmonicView[] GetViews()
        {
            return _harmonics.ToArray();
        }

        public List<IHarmonic> GetHarmonics()
        {
            return _harmonics;
        }
    }
}
