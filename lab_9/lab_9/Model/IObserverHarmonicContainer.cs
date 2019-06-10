using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace lab_9.Model
{
    public interface IObserverHarmonicContainer
    {
        void RemovedHarmonic(int index);
        void AddedHarmonic(int index);
    }
}
