using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace lab_9.Model
{
    public interface IHarmonicContainer : IHarmonicContainerView
    {
        void AddHarmonic(IHarmonic harmonic);
        void RemoveHarmonic(int index);
        int GetHarmonicCount();
        List<IHarmonic> GetHarmonics();
        void SetObserver(IObserverHarmonicContainer observer);
    }
}
