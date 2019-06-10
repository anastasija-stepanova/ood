using lab_9.Model;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace lab_9.Controller
{
    public interface IAddingController
    {
        void SetAmplitude(double value);
        void SetPhase(double value);
        void SetFrequency(double value);
        void SetHarmonicType(HarmonicType harmonicType);
        void AddHarmonic();
        void Exit();
    }
}
